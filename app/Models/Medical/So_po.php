<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class So_po extends Model
{

public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $dates = ['d_posplan','d_operplan','d_outplan'];

   public  $fillable = ['nib','PatientID','tnib','nibcard','pac_fio','pacfam','pacname','pacsurname','pac_sex','pac_born','w_tlph','pos_d','out_d','d_posplan','d_operplan','d_outplan','posdiacode','p_oper','user_id','indcode','oper','created_at', 'p_payout_id','p_payout1_id','p_payout2_id','palata_id','p_operblock_id', 'oper2','type1','type2','oper3', 'type3', 'type4','posdiacodetext',
   'timeoper','timegos', 'company1_id','company2_id','company3_id','posdiacodetext','type1','type2','type3','type4','isfirst_id','viewoper','no_oper','palata_id','comment','daybeforeoper', 'bag_id']; //атрибут массового присвоения

      protected $primaryKey = 'nib';

       public function user() //Как называется таблица
    {
        return $this->belongsTo(User::class);
    }
}
