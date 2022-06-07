<?php

namespace App\Models\Medical;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class So_posoper extends Model
{

public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;
    protected $dates = ['d_operplan'];

   public  $fillable = ['id','nib','p_oper','p_payout_id','d_operplan','ref','posdiacode','isfirst','user_id','p_operblock_id','timeoper','event_start','event_end']; //атрибут массового присвоения

      protected $primaryKey = 'id';

       public function user() //Как называется таблица
    {
        return $this->belongsTo(User::class);
    }
}
