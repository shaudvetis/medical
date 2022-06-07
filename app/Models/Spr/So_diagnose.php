<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class So_diagnose extends Model
{
     public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','name', 'p_payout_id', 'comment','created_at',]; //атрибут массового присвоения
   

    

}
