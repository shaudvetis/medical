<?php

namespace App\Repositories;
use Carbon\Carbon;
use App\Models\{
    User,
    Medical\So_po,
    Medical\So_posdev,
    Medical\So_posoper,
    Medical\So_posrisknib,
    //Spr\P_payout,
    //Spr\P_dolgn,
    //Spr\Palat,
    //Spr\P_bag,
    //Spr\P_operblock,
   // Spr\P_oper,
   Spr\So_diagnose
   // Spr\So_risk,
   // Spr\So_device
};
use DB;

class MedicalRepository
{
    /**
     * Запрос на вывод страниці направления, работа с фильтрами     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function filter($request, $payout_id)
    {
      $querys=So_po::select('so_pos.*', 'users.fullname','p_payouts.id','p_payouts.name')->leftJoin('users', 'users.id', '=', 'so_pos.user_id')->leftJoin('p_payouts', 'p_payouts.id', '=', 'so_pos.p_payout_id');

       if(!empty($request->id && $request->id=='activ')) $querys->where('so_pos.p_payout_id','=', $payout_id);
      
       if(!empty($request->id && $request->id=='dposplan')) $querys->where('so_pos.d_posplan','>', Carbon::now()->addDays(1));
      
       if(!empty($request->id && $request->id=='all')) $querys->where('so_pos.p_payout_id','!=', ' ');


       else $querys->where('so_pos.p_payout_id','=', $payout_id);
      
       $query=$querys->toBase()->paginate(10);

      return $query;          
    }     
    
   /**
     * Запрос на поиск по нибу в со пос для записи направления в со пос  *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function soposSearch ($id)
    {
     
     $query = So_po::find($id);   
    
     return $query;          
    }   

    /**
     * Если есть что тов инструментах то добовляем\удаляем
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function soDevicepost ($request, $soposID)
    {
     foreach($request->device as $key =>$value) {
     if ($value == 0) {
     $query = new So_posdev;
     $query->so_device_id= $key;
     $query->nib = $soposID;
     $query->opercode=$request->p_oper;
     $query->comment=1;
     $query->save(); 
    }
    if ($value == '01') {
    $query = So_posdev::where('nib', $soposID)->where('so_device_id', $key)->delete();
    }
   }
     //return $query;          
  }   

   /**
     * Если не пусто в дате операции и в названии операции то дублируем информацию в сопосопер
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function soposOper($soposoperid,  $soposID, $request)
    {
       $query = So_posoper::updateOrCreate(['id'   => $soposoperid,],
    [
       'nib'     => $soposID,
       'p_oper' => $request->p_oper,
       'isfirst'    => 1,
       'timeoper'    => $request->timeoper,
       'p_operblock_id'    => $request->p_operblock_id,
       'd_operplan'   => $request->d_operplan,
       'p_payout_id' =>$request->p_payout_id,
       'user_id' =>$request->user_id
    ],
    );
    
     return $query;          
    }   
   
   /**
     * Делаем запрос в уский справочник диагнозов и выбираем все по коду направления врача
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function soDiagnoz($payout_id)
    {
      
      $query = So_diagnose::select('so_diagnoses.*','p_payouts.id as idp','so_diagnoses.name','p_payouts.name as payoutname' )
      ->leftJoin('p_payouts', 'so_diagnoses.p_payout_id', '=', 'p_payouts.id')
      ->orderby('so_diagnoses.p_payout_id', 'asc')->where('p_payout_id',  $payout_id)->toBase()->get(); 
    
     return $query;          
    }   

  /**
     * Запрос к справочнику инструментов + инструментам для пациента ранее записаных so_posdevs и выводим по нибу
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function soDeviceNib($id)
    {
      
      $query = DB::SELECT("SELECT so_devices.*, m1.comment as comm1, m1.so_device_id  FROM so_devices 

      LEFT JOIN (select  so_posdevs.comment, so_device_id from so_posdevs where nib = '$id') as m1 ON so_devices.id=m1.so_device_id ");
    
     return $query;          
    }   

  /**
     *Риски, добавление удаление по пациенту
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
   
    public function soRizkipost ($request)
    {
    foreach($request->id as $key =>$value) {
     if ($value == 0) {
     $query = new So_posrisknib;
     $query->so_risk_id= $key;
     $query->nib = $request->nib;
     $query->save(); 
    }
    if ($value == '01') {
    $query=So_posrisknib::where('so_risk_id', $key)->delete();
    }
   }
     //return $query;          
  }   

}