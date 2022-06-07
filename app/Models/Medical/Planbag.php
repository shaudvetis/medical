<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class Planbag extends Model
{
    
public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $dates = ['d_posplan','d_operplan','d_outplan'];
    
   public  $fillable = ['nib','data','palat_id','bag_id','bag_name','palat_name','nib1','nib2','oper','pac_sex1','pac_sex2','pac_fio1','pac_fio2','bron','color']; //атрибут массового присвоения
   
      //protected $primaryKey = 'nib';

       public function user() //Как называется таблица
    {
        return $this->belongsTo(User::class);
    }  
}

          