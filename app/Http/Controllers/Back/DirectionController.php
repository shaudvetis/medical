<?php

namespace App\Http\Controllers\Back;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Repositories\MedicalRepository;
use App\Models\Medical\So_po;
use App\Models\Medical\So_poscard;
use App\Models\{
    User,
    Spr\P_payout,
    Spr\P_dolgn,
    Spr\Palat,
    Spr\P_bag,
    Spr\P_operblock,
    Spr\P_oper,
    Spr\So_diagnose,
    Spr\So_device,
    Spr\ So_risk,
    Medical\So_posdev,
    Medical\So_posoper,
    Medical\So_posrisknib,
    Medical\Planbag
};
use DB;
use Auth;
use DateTime;

class MedicalController extends Controller
{
   /**
     * Запуск страници направления главная со справочника физ лиц
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */  

      protected $repository;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(MedicalRepository $repository)
  {
      //$this->middleware('auth');
      $this->repository = $repository;
     
  } 

    public function filter(Request $request)
    {

       if (!Auth::check()) {
            return redirect()->route('start');
        }

         $payout_id =Auth::user()->p_payout_id;
   
         $user= $this->repository->filter($request, $payout_id);

      //      dump($user);
      // exit();

       return view('back.filter.filtergroup',compact('user'));
    }
    
     
    /**
     * Ввод физ карточки открітие формі ввода дати редирект по посту  перенести в отдельный контроллер
     *
     * @param  \App\Http\Requests\CartRequest $request
     * @return \Illuminate\Http\Response
     */      
    public function  searchuser(Request $request)
    {
    
       return view('back.filter.searchuser');
    }  
    
   /**
     * Поиск физ карточки  по дате и вывод  перенести в отдельный контроллер
     *
     * @param  \App\Http\Requests\CartRequest $request
     * @return \Illuminate\Http\Response
     */      
    public function searchuserdate (Request $request)
    {
       $user = DB::connection('admin')->select("select * from Patient with(nolock) WHERE PatientBirthDate='$request->pac_born' ");
       
    //So_poscard::where('pac_born', $request->pac_born)->get();
    // dump($user);
    //   exit();

       return view('back.filter.searchuser', compact('user'));
    }  

   /**
     * Создание направления и запись в сопос  переделать
     *
     * @param  \App\Http\Requests\CartRequest $request
     * @return \Illuminate\Http\Response
     */      
    public function refsurgery(Request $request, $id)
    {
          

    $user = DB::connection('admin')->select("select * from Patient with(nolock) WHERE PatientID='$id' ");
       
    //So_poscard::where('pac_born', $request->pac_born)->get();
   
    $so_poscard = So_poscard::select('nibcard')->where('PatientID', $id)->get()->toarray();
    
   if(empty($so_poscard)){
   foreach ($user as $users){
  
        $post = new So_poscard;
        $post->PatientID = $users->PatientID;
        $m2=mb_substr($users->PatientName2,0,1, 'UTF-8');
        $m3=mb_substr($users->PatientName3,0,1, 'UTF-8');
        $post->pac_fio = $users->PatientName1.' '.$m2.'.'.$m3;
        $post->pacfam = $users->PatientName1; 
        $post->pacname = $users->PatientName2;
        $post->pacsurname = $users->PatientName3;

        

        if($users->PatientSexRef =='FEM'){
            $post->pac_sex = 2;
        }
        if($users->PatientSexRef =='MAL'){
            $post->pac_sex = 1;
        }
        $post->pac_born = Carbon::parse($users->PatientBirthDate)->format('Y-m-d');
        $post->w_tlph = $users->PatientPhone;
        $post->street = $users->PatientAddress;
        $post->email = $users->PatientEmail;
        $post->created_at = date("Y-m-d H:i:s");
        $post->save();
    }


   }

    $so_poscard1 = So_poscard::select('*')->where('PatientID', $id)->get();
  
    foreach ($so_poscard1 as $so_poscard2){
        $post1 = new So_po;
        $post1->PatientID = $so_poscard2->PatientID;
        $post1->nibcard = $so_poscard2->nibcard;
        $post1->pac_fio = $so_poscard2->pac_fio;
        $post1->pacfam = $so_poscard2->pacfam;
        $post1->pacname = $so_poscard2->pacname;
        $post1->pacsurname = $so_poscard2->pacsurname;
        $post1->pac_sex = $so_poscard2->pac_sex;
        $post1->pac_born = $so_poscard2->pac_born;
        $post1->w_tlph = $so_poscard2->w_tlph;
        $post1->created_at = date("Y-m-d H:i:s");
        $post1->save();
    }
        //$d=$post1->nib;
    $nibId=$post1->nib;
    $item=So_po::find($nibId);

        //Запрос к справочнику инструментов + инструментам для пациента ранее записаных и выводим по нибу

         $all=$this->repository->soDeviceNib($nibId);
    //  dump($item);
    //  exit();
    


     return view('back.filter.refsurgery', compact('item')); 

    }  
    
     // Запись направления в сопос
     public function refsurgerypost (Request $request, $id)
     {
        // dd($request);
        // exit();
    //Находим  пациента в со пос
    $soposNib=$this->repository->soposSearch($id);

    $itog=DB::transaction(function() use ($request, $id, $soposNib) {
     
     //Обновляем  пациента в со пос
     $soposNib1=$soposNib->update($request->all());

     //Берем ниб который обновили
     $soposID=$soposNib->nib;
       
      //Берем значение с isfirst_id (проверяем есть ли там ид с So_posoper)
      $soposoperid=$soposNib->isfirst_id;

      //Проверяем массив с оборудованием  если не пусто то вставляем\удаляем записи
        if(!empty($request->device)) {
           //Новый добовляем$soposID
          $result=$this->repository->soDevicepost($request,$soposID);
         }
      //Если не пусто в дате операции и в названии операции то дублируем информацию в сопосопер
        if((!empty($request->d_operplan)) && (!empty($request->p_oper))) {

          $so_oper=$this->repository->soposOper($soposoperid, $soposID, $request);

          if(empty($soposoperid)){
            $so_posoperid=$so_oper->id;
            $soposNib->update(['isfirst_id' => $so_posoperid]);
          }
        }
        
       }, 5);    

      $user=$soposNib;  
   
    // Закоментировано работа с палатами
         $rt=date_diff(Carbon::parse($request->d_posplan), Carbon::parse($request->d_outplan));
         $period = CarbonPeriod::create($request->d_posplan,  $request->d_outplan);
         $m2=array();
         
         foreach ($period as $date) {
         $m2[]=$date->format('Y-m-d');
     }
 
     
        
 //Закоментировано работа с палатами
 // $i=0;
 // $lastPos = count($m2) - 1;
 
 // foreach ($m2 as $item) {
 
 // $pal = Planbag::where('data',$item)->where('bag_id', $request->palata_id)->where('nib1',NULL)->where('bron','!=',1)->first();
 
 //              dump( $pal);
 //           exit();
 // if($i==0){
 //  $pal->update(['nib1' => $id, 'oper'=>1, 'pac_sex1'=>$request->pac_sex1, 'pac_fio1'=>$request->pac_fio, 'color'=>'#87CEEB']);
 // }
 // else if ($i === $lastPos) {
 //    $pal->update(['nib1' => $id, 'oper'=>1, 'pac_sex1'=>$request->pac_sex1, 'pac_fio1'=>$request->pac_fio, 'color'=>'#0000FF']);
 //     }
 // else {
 // $pal->update(['nib1' => $id, 'oper'=>1, 'pac_sex1'=>$request->pac_sex1, 'pac_fio1'=>$request->pac_fio,'color'=>'#87CEEB']);
 
 // }
 //  ++$i;
 // }
             // dd($request);
             //  exit(); 
// $post = So_po::find($id)->update(['posdiacode' => $request->posdiacode, 'posdiacodetext' => $request->posdiacodetext, 'p_oper' => $request->p_oper, 'user_id' => $request->user_id, 'd_operplan' => $request->d_operplan, 'd_posplan' => $request->d_posplan, 'd_outplan' => $request->d_outplan, 'palata_id' => $request->palata_id, 'p_operblock_id' => $request->p_operblock_id]);
       
         return view('back.filter.refsurgerynapr',compact('user'));
     } 

     public function grpacient (Request $request)
    
     {  
         
       $bag=DB::select('select id, palat_name, palat_id, num_bags, palat_id from p_bags');
 
       $current=Carbon::now()->format('Y-m-d');
       $dates = Carbon::now()->addDay(60);
   
       $period = CarbonPeriod::create($current,  $dates);
       
       $palat=DB::select("select data, palat_id,m1.pac_fio, id, bag_name, palat_name, nib1 from planbags 
       
       LEFT JOIN (select nib, nibcard, pac_fio from so_pos) as m1 on planbags.nib1=m1.nib
 
       where planbags.data >='$current' AND planbags.data <'$dates' ");
            
         $m2=array();
         
         foreach ($period as $date) {
         $m2[]=$date->format('Y-m-d');
     }
     
      $f=implode(',',$m2);
      
     $test = DB::select("select data, palat_id, id, m1.pac_fio,bag_name,color, bag_id, palat_name,nib1,bron, pac_sex1,pac_fio1 from planbags 
      LEFT JOIN (select nib, nibcard, pac_fio from so_pos) as m1 on planbags.nib1=m1.nib
      where planbags.data >='$current' AND planbags.data <'$dates'  ");
     
     $rt=[];
     
     foreach ($test as $key => $value) {
 
         $rt[$value->palat_name.'- кр'.$value->bag_name]['nib'][]=$value->pac_fio;
         $rt[$value->palat_name.'- кр'.$value->bag_name]['idpalat'][]=$value->bag_id;
         $rt[$value->palat_name.'- кр'.$value->bag_name]['id'][]=$value->id;
         $rt[$value->palat_name.'- кр'.$value->bag_name]['pac_sex'][]=$value->pac_sex1;
         $rt[$value->palat_name.'- кр'.$value->bag_name]['bron'][]=$value->bron;
         $rt[$value->palat_name.'- кр'.$value->bag_name]['color'][]=$value->color;
     }
 
           //       dump($palat);
           // exit();
 
       if ($request->ajax()) {
            if ($request->hook=='gr')
             return response()->json([
                 'table' => view("back.filter.brick-grpacient", ['m2' => $m2, 'rt' => $rt])->render(),
             ]);
       } 
       
         if ($request->ajax()) {
             if ($request->hook=='bron')
              foreach ($request->id as $item) {
              $pal = Planbag::where('id',$item)->first();
              $pal->update(['bron' => 1]);
              } 
               
             return json_encode('ok');
 
                    //return response()->json('ok Оберіть інший місяць!');
       }     
       
      return view('back.grpacient', compact('palat','m2','bag','rt')); 
    } 

  /**
     * Создание направления открытие карточки взятие с со_пос, также подгрузка справочников палат, направления с 
     * ViewComposer
     * @param  \App\Http\Requests\CartRequest $request
     * @return \Illuminate\Http\Response
     */ 

    public function addsurgery (Request $request, $id)
    {

      if (!Auth::check()) {
         return redirect()->route('start');
        }
      
         $mkb_group = Cache::rememberForever('mkb_group', function() {
        return IcdGroup::where('parent_id', 0) 
         ->with('children')
         ->get();
        });
    
     // dd($request);
     //     exit();

        //Находим  пациента в со пос
        $item=$this->repository->soposSearch($id);
        
        //Берем его направление работы
        $payout_id =Auth::user()->p_payout_id;
        
        //Делаем запрос в уский справочник диагнозов и выбираем все по коду направления врача
        
         $query=$this->repository->soDiagnoz($payout_id);
        
        //Запрос к справочнику инструментов + инструментам для пациента ранее записаных и выводим по нибу

         $all=$this->repository->soDeviceNib($id);

         $r=Carbon::now();

         if(isset($request->hook) && ($request->hook=='next')) {
          $r=Carbon::parse($request->data)->addDays(1)->format('Y-m-d');
         }
         
          if(isset($request->hook) && ($request->hook=='back')) {
          $r=Carbon::parse($request->data)->subDays(1)->format('Y-m-d');
         }

         $da=Carbon::parse($r)->startOfWeek()->format('Y-m-d');
        
         $da1 = Carbon::parse($r)->endOfWeek()->format('Y-m-d');

 // dd($dat);
 //         exit();

         $operblockoper = DB::select("SELECT id as idoperblock, opername,npp,startwork,endwork, m5.d_operplan, m1.pac_fio, m2.u2name, m3.fullname, m4.color, m5.timeoper, m5.p_operblock_id, (SUM(m5.timeoper)) as sumoper, ((endwork)-(SUM(m5.timeoper))) as itogo, CONCAT_WS('<br>', GROUP_CONCAT(( m2.u2name), ' Пац-', (m1.pac_fio), ' Хір-', (m3.fullname) SEPARATOR '<hr> ') ) as groupinfo from p_operblocks

        
         LEFT JOIN (select id as idsooper, nib,p_oper,p_payout_id,d_operplan,user_id,p_operblock_id,timeoper from so_posopers  where  so_posopers.d_operplan between '$da' and '$da1'  order by p_operblock_id asc, so_posopers.d_operplan asc) as m5 ON p_operblocks.id=m5.p_operblock_id

         LEFT JOIN (select nib, pac_fio from so_pos ) as m1 ON m5.nib=m1.nib 

         LEFT JOIN (select id as idoper, u2name from p_opers ) as m2 ON m5.p_oper=m2.idoper

         LEFT JOIN (select id as iduser, fullname from users ) as m3 ON m5.user_id=m3.iduser

         LEFT JOIN (select id as idpayout, color from  p_payouts ) as m4 ON m5.p_payout_id=m4.idpayout 


          group by p_operblocks.id, m5.d_operplan order by p_operblocks.id asc, m5.d_operplan asc
         ");
         //      dd( $operblockoper);
         // exit();


       $period = CarbonPeriod::create($da,  $da1);
       
       $m32=array();
       
      
        foreach ($period as $date) {
          $m3[]=$date->format('Y-m-d');
        }
  
   $dates = $period;

$days = [
    'Неділя', 'Понеділок', 'Вівторок', 'Середа',
    'Четверг', 'Пятниця', 'Субота'
];

$m3=array();

foreach($dates as $d){
   $m3[$d->format('d-m-Y')]=$days[ date("w", strtotime($d) )];
}


     $rts=[];
     
     foreach ($period as $date) {

     foreach ($operblockoper as $key => $value) {

       if($date->format('Y-m-d')==$value->d_operplan){

         $rts[$value->idoperblock][$date->format('Y-m-d')][] ="<p style='background-color:$value->color'>"."<span style='font-size:12px;font-weight: bold;'>".'Занято-'.$value->sumoper.'\\ Вільно - '.$value->itogo.'</span>'.'<br> '.$value->groupinfo.'</p>'.'<hr>';
    
        
  }
       
       else{
        $rts[$value->idoperblock][$date->format('Y-m-d')][] = '';
       }
 }
}

 if ($request->ajax()) {
            return response()->json([
                'table' => view("back.filter.operblock", ['rts' => $rts, 'm3' => $m3,'da'=>$da, 'da1'=>$da1])->render(),
            ]);
        } 
        // dd($rts);
        //  exit();

     return view('back.filter.refsurgery', compact('item','query', 'all','rts','m3', 'da', 'da1','mkb_group')); 
   
    }
   /**
     * Работа с ризками с карточки направоения в стационар 
     * ViewComposer
     * @param  \App\Http\Requests\CartRequest $request
     * @return \Illuminate\Http\Response
     */ 

    public function sogetnibrizki ($id)
    {

      if (!Auth::check()) {
         return redirect()->route('start');
        }
       
      $query1 = DB::SELECT("SELECT so_risks.*, m1.so_risk_id   FROM so_risks

      LEFT JOIN (select  so_posrisknibs.id, so_risk_id, nib, comment from so_posrisknibs where nib = '$id') as m1 ON so_risks.id=m1.so_risk_id  order by npp asc");
         // Ajax response
      
   $query12=[];
   
   foreach ($query1 as $key => $value) {
     if($value->ngroup==1){
     $query12['group1'][]=$value;
   }
   else {
    $query12['group2'][]=$value;
   }
}
  //$query12['group1']=$query1;
    // dump($query12);
    // exit();
     
     return view('back.filter.so_posrizki ',compact('id', 'query12', 'mkb_group')); 
   
    }

      /**
     *Риски, добавление удаление по пациенту
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function  postnibrizki (Request $request)
    {

  // dump($request);
  //   exit();

   $query=$this->repository->soRizkipost($request);
       
     
   return redirect()->route('soposnibrizki',$request->nib); 
   
    }
   
}




