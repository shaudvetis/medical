<?php

namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class Sheduleoperblock extends Model
{

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $dates = ['d_posplan','d_operplan','d_outplan'];

    public  $fillable = ['id','p_operblock_id','npp','color','comment','work_start','work_end','worktime_start','worktime_end',
        'hours']; //атрибут массового присвоения

    protected $primaryKey = 'nib';

    protected $table = 'sheduleoperblocks';


}
