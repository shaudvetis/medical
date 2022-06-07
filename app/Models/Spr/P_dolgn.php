<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class P_dolgn extends Model
{
      public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','dolgname', 'dolgnameoper','created_at',]; //атрибут массового присвоения
   

}
