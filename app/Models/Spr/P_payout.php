<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class P_payout extends Model
{
      public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','name', 'color','created_at',]; //атрибут массового присвоения
   

}
