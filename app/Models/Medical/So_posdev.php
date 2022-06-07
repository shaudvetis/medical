<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class So_posdev extends Model
{

  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


   public  $fillable = ['nib','so_device_id','opercode','npp','comment']; //атрибут массового присвоения


}
