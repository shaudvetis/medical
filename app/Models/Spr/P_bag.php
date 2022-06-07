<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class P_bag extends Model
{
      public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','palat_id', 'palat_name', 'num_bags','deleted_at','created_at',]; //атрибут массового присвоения
   

}
