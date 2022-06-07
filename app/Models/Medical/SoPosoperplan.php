<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class SoPosoperplan extends Model
{

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public  $fillable = ['id','nib','d_operplan','p_operblock_id', 'npplan', 'color', 'comment', 'comment', 'eventdate_start',
        'eventdate_end', 'eventtime_start', 'eventtime_end', 'event_end', 'so_posoper_id']; //атрибут массового присвоения


    protected $primaryKey = 'id';
    protected $table = 'so_posoperplans';

    public function user() //Как называется таблица
    {
        return $this->belongsTo(User::class);
    }
}
