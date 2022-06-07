<?php

namespace App\Models\Spr;

use Illuminate\Database\Eloquent\Model;

class IcdDiagnoses extends Model
{
     public $timestamps = false;
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['id','gr1', 'gr2','gr3', 'code','name_diagnoses']; //атрибут массового присвоения
   
   protected $table = 'icd_diagnoses';


   //  public function children ()
   // {
   //   return $this->hasMany(IcdGroup::class, 'parent_id', 'id')->with('children');
   // }
}
