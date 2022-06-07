<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class So_posrisknib extends Model
{
    
public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
   public  $fillable = ['id','nib','so_risk_id','comment']; //атрибут массового присвоения
   
      protected $primaryKey = 'id';

       public function user() //Как называется таблица
    {
        return $this->belongsTo(User::class);
    }  
}
