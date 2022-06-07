<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class Palat extends Model
{
      public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','name', 'countp', 'rean','created_at',]; //атрибут массового присвоения
   

}
