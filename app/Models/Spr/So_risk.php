<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class So_risk extends Model
{
     public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','nametromb2', 'npp','idtromb1', 'nball','tromborisk','operrisk','ntitle','color','nameup','ngroup','cnumber','created_at',]; //атрибут массового присвоения
   


}
