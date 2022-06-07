<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class So_device extends Model
{
     public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','name', 'npp','comment','created_at',]; //атрибут массового присвоения
   

    

}
