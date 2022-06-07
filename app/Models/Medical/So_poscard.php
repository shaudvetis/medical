<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class So_poscard extends Model
{
    
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public  $fillable = ['nibcard','PatientID','pac_fio','pacfam','pacname','pacsurname','pac_sex','pac_born','ambulatid','cntrycode','oblcode','obcitycode','regoblcode','regcitcode','countr','street','numhouse','numkorp','numflat','w_tlph','email','created_at']; //атрибут массового присвоения
   
      protected $primaryKey = 'nibcard';
}
