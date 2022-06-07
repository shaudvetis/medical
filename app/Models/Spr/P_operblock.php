<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class P_operblock extends Model
{
      public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','opername', 'npp','startwork','endwork', 'created_at',]; //атрибут массового присвоения
   

}
