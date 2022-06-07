<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    User,
    Spr\P_payout,
    Spr\P_dolgn,
    Spr\Palat,
    Spr\P_bag,
    Spr\P_operblock,
    Spr\P_oper,
    Spr\So_diagnose,
    Spr\So_risk,
    Spr\So_device
};
use DB;

class SprRepository
{

    /**
     * Переменная $model_spr- справочника направлений
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
        protected $model_spr;
        protected $model_dolgn;

    /**
     * Create a new SprRepository instance.
     *
     * @param  \App\Models\Spr\P_payout $p_payout
     * @param  \App\Models\Spr\Apimessage $apimessage     
     */
    
     public function __construct(P_payout $p_payout, P_dolgn $p_dolgn)
    {
        $this->model_spr = $p_payout; 
        $this->model_dolgn = $p_dolgn;        
    }

    /**
     * Запрос на вывод справочника направлений
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function p_payoutget($request)
    {
      $query=$this->model_spr::all();

      return $query;          
    }     
    
    /**
     * Запрос на запись нового справочника направлений
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function p_payoutpost($request)
    {
      $query=P_payout::create($request->all()); 

      return $query;          
    }   
    
    /**
     * Запрос на обновление справочника направлений
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function p_payoutupdate($request, $id)
    {
        
     $query=$this->model_spr::find($id)->update(['name' => $request->name, 'color' => $request->color]);

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника направлений
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function p_payoutdestroy($request, $id)
    {
        
      $query=$this->model_spr::find($id)->delete();

      return $query;          
    }   
   
     /**
     * Запрос на вывод справочника должностей
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function pdolgnget($request)
    {
      $query=$this->model_dolgn::all();

      return $query;          
    }     
    
    /**
     * Запрос на запись новой должности
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
     public function  pdolgnpost($request)
    {
      $query=$this->model_dolgn::create($request->all()); 

      return $query;          
    }   
    
    /**
     * Запрос на обновление справочника должностей
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function  pdolgnupdate($request, $id)
    {
        
     $query=$this->model_dolgn::find($id)->update(['dolgname' => $request->dolgname]);

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника должностей
     *
     * @param  \App\Http\Requests\Request $request
     */

    public function  pdolgndestroy($request, $id)
    {
        
      $query=$this->model_dolgn::find($id)->delete();

      return $query;          
    }   


    /**
     * Запрос на вывод справочника пользователей
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function userget($request)
    {
      $query=User::select('users.*','p_payouts.id as idpayout','p_payouts.name as namenapr','p_dolgns.id as idpdolg', 'p_dolgns.dolgname'  )
      ->leftJoin('p_payouts', 'users.p_payout_id', '=', 'p_payouts.id')
      ->leftJoin('p_dolgns', 'users.p_dolgn_id', '=', 'p_dolgns.id')
      ->get();

      return $query;          
    }     
    
    /**
     * Запрос на добовление нового пользователя
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function  userstore($request)
    {
        
     $query= User::create([
      'name' => $request->name,
      'surname' => $request->surname,
      'lastname' => $request->lastname,
      'fullname' => $request->fullname,
      'namedoc' => $request->namedoc,
      'phone' => $request->phone,
      'email' => $request->email,
      'role' => $request->role,
      'date_bird' => $request->date_bird,
      'password' => Hash::make($request->password),
      'textpassword' => $request->password,
      'p_dolgn_id' => $request->p_dolgn_id,
      'p_payout_id' => $request->p_payout_id,
      'namecomp' => 'medical',
      'isxcode' => $request->isxcode
  ]);

      return $query;          
    }   

   /**
     * Запрос на обновление справочника пользователей
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function  userupdate($request, $id)
    {
        
     $query= User::find($id)->update([ 'name' => $request->name,
     'surname' => $request->surname,
     'lastname' => $request->lastname,
     'fullname' => $request->fullname,
     'namedoc' => $request->namedoc,
     'phone' => $request->phone,
     'email' => $request->email,
     'date_bird' => $request->date_bird,
     'password' => Hash::make($request->password),
     'textpassword' => $request->password,
     'p_dolgn_id' => $request->p_dolgn_id,
     'p_payout_id' => $request->p_payout_id,
     'isxcode' => $request->isxcode ]);

      return $query;          
    }   

     /**
     * Запрос на удаления строки справочника пользователя
     *
     * @param  \App\Http\Requests\Request $request
     */

    public function  userdestroy($request, $id)
    {
        
      $query=User::find($id)->delete();

      return $query;          
    }   

  /**
     * Запрос на вывод справочника палат
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function palatget($request)
    {
      $query=Palat::all();

      return $query;          
    }     
    
    /**
     * Запрос на запись новой палаті и койки
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function palatpost($request)
    {
      $query= DB::transaction(function() use ($request) {
        $palata = new  Palat;
        $palata->name = $request->name;
        $palata->countp = $request->countp;
        $palata->rean = $request->rean;
        $palata->created_at = date("Y-m-d H:i:s");
        $palata->save();
      
        $x=$palata->id;
        $xn=$palata->name;
        
        for ($i = 1; $i<=$request->countp; $i++) {
        $bag = new  P_bag;
        $bag->palat_id = $x;
        $bag->palat_name = $xn;
        $bag->num_bags = $i;
        $bag->created_at = date("Y-m-d H:i:s");
        $bag->save();
      
    }
 }, 2);
      return $query;          
    }   
    
    /**
     * Запрос на обновление справочника палат и коек
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function palatupdate($request, $id)
    {
      $query= DB::transaction(function() use ($request, $id) {
      
      Palat::find($id)->update(['name' => $request->name, 'countp' => $request->countp, 'rean' => $request->rean]);
      
      if($request->name != $request->nameold) {
        P_bag::where('palat_name', $request->nameold)->update(['palat_name' => $request->name]);
      }
      //   Если больше нужно добавить разницу
      if($request->countp > $request->countpold) {

        $x=$request->countpold+1;
        for ($i = $x; $i<=$request->countp; $i++) {
        $bag = new  P_bag;
        $bag->palat_id = $id;
        $bag->palat_name = $request->name;
        $bag->num_bags = $i;
        $bag->created_at = date("Y-m-d H:i:s");
        $bag->save();

      }
      }
      // Если меньше нужно убрать разницу и новое знач меньше старого цикл работает пока старое больше нового
      if($request->countp < $request->countpold) {
       for ($i =$request->countpold; $i>$request->countp; $i--) {
        P_bag::where('palat_id', $id)
        ->where('num_bags', $i)
        ->delete();
      }
      }
     }, 2);
    
     return $query;          
    }   
    
    /**
     * Запрос на удаления строки палаты и коек
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function palatdestroy($request, $id)
    {
      $query= DB::transaction(function() use ($request, $id) {  
       Palat::find($id)->delete();
       P_bag::where('palat_id', $id)->delete();

    }, 2);

      return $query;          
    }   

 /**
     * Запрос на вывод справочника оперблока
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function blockoperget($request)
    {
      $query=P_operblock::all();

      return $query;          
    }     
    
    /**
     * Запрос на запись нового справочника работі оперблока
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function blockoperpost($request)
    {
      $query=P_operblock::create($request->all()); 

      return $query;          
    }   
    
    /**
     * Запрос на обновление справочника направлений
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function blockoperupdate($request, $id)
    {
        
     $query= P_operblock::find($id)->update(['opername' => $request->opername, 'startwork' => $request->startwork, 'endwork' => $request->endwork, 'npp' => $request->npp]);

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника оперблока
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function blockoperdestroy($request, $id)
    {
        
      $query=P_operblock::find($id)->delete();

      return $query;          
    }   
   
  /**
     * Запрос на вывод справочника операций
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function operget($request, $payout_id)
    {
     
      $query = P_oper::select('p_opers.*','p_payouts.id as idp','p_payouts.name' )
      ->leftJoin('p_payouts', 'p_opers.p_payout', '=', 'p_payouts.id');
   
      
      if(!isset($request->p_payout)) $query->where('p_payout',  $payout_id);

      if(isset($request->p_payout) && $request->p_payout !='all') $query->where('p_payout',  $request->p_payout);     
  

      return $query->get();     
          
    }  

   /**
     * Запрос на запись нового направления операции
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function operpost($request)
    {
      $query=P_oper::create($request->all()); 

      return $query;          
    }   
    
    /**
     * Запрос на обновление справочника операций
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function operupdate($request, $id)
    {
        
     $query= P_oper::find($id)->update(['p_payout' => $request->p_payout, 'u2name' => $request->u2name, 'su_price' => $request->su_price, 'timegos' => $request->timegos, 'timeoper' => $request->timeoper ]);

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника операции
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function operdestroy($request, $id)
    {
        
      $query=P_oper::find($id)->delete();

      return $query;          
    }   
   
 /**
     * Запрос на вывод справочника операций
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function diagnosesget($request, $payout_id)
    {
     
     $query = So_diagnose::select('so_diagnoses.*','p_payouts.id as idp','so_diagnoses.name','p_payouts.name as payoutname' )
      ->leftJoin('p_payouts', 'so_diagnoses.p_payout_id', '=', 'p_payouts.id')
      ->orderby('so_diagnoses.p_payout_id', 'asc');

      if(!isset($request->p_payout)) $query->where('p_payout_id',  $payout_id);

      if(isset($request->p_payout) && $request->p_payout !='all') $query->where('p_payout_id',  $request->p_payout);     
 
      return $query->get();          
    }  

   /**
     * Запрос на запись нового направления операции
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function diagnospost($request)
    {
      $query= So_diagnose::create($request->all()); 

      return $query;          
    }   

    /**
     * Запрос на обновление справочника диагнозов
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function diagnosupdate($request, $id)
    {
        
     $query= So_diagnose::find($id)->update($request->all());

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника диагнозов
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function diagnosdestroy($request, $id)
    {
        
      $query=So_diagnose::find($id)->delete();

      return $query;          
    }   
    
/**
     * Запрос на вывод справочника рисков
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function rizkget($request)
    {

      $query = So_risk::where('ngroup', '1')->orderby('npp', 'asc')->get();

      return $query;          
    }  

    /**
     * Запрос на вывод справочника рисков 3 группа
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function rizkget3($request, $id)
    {

      $query = So_risk::where('ngroup', $id)->orderby('ntitle', 'desc')->orderby('nameup', 'asc')->get();

      return $query;          
    }  

   /**
     * Запрос на запись нового риска
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function rizkpost($request)
    {
     
      $query= So_risk::create($request->all()); 

      return $query;          
    }   

    /**
     * Запрос на обновление справочника рисков
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function rizkupdate($request, $id)
    {
      $nameup=mb_strtoupper($request->nametromb2);  

      $query= So_risk::find($id)->update(['nametromb2' => $request->nametromb2, 'nball' =>$request->nball, 'nameup' => mb_strtoupper($request->nametromb2),'ngroup' => $request->ngroup,'cnumber' => $request->cnumber ]);

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника диагнозов
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function rizkdestroy($request, $id)
    {
        
      $query=So_risk::find($id)->delete();

      return $query;          
    }   

    /**
     * Запрос на вывод справочника уник оборудования
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sodeviceget($request)
    {

      $query = So_device::all();

      return $query;          
    }  

   /**
     * Запрос на запись уник оборудования
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sodevicepost($request)
    {
      $query= So_device::create($request->all()); 

      return $query;          
    }   

    /**
     * Запрос на обновление справочника уник оборудования
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function sodeviceupdate($request, $id)
    {
        
      $query= So_device::find($id)->update($request->all());

      return $query;          
    }   
    
    /**
     * Запрос на удаления строки справочника уник оборудования
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */

    public function sodevicedestroy($request, $id)
    {
        
      $query=So_device::find($id)->delete();

      return $query;          
    }   
}

