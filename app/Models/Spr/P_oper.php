<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class P_oper extends Model
{
     public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','u2name', 'p_payout', 'su_price', 'su_price1','timegos', 'timeoper','created_at',]; //атрибут массового присвоения
   
           /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function p_payout() //Как называется таблица
    {
        return $this->belongsTo(Models/P_payout::class);
    }    
    

}
