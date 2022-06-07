<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSoposoperplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_posoperplans', function (Blueprint $table) {
            $table->id();
            $table->integer('nib');
            $table->date('d_operplan');
            $table->integer('p_operblock_id');
            $table->integer('npplan')->comment('номер строки для пац');
            $table->string('color');
            $table->string('comment');
            $table->string('eventdate_start');
            $table->string('eventdate_end');
            $table->string('eventtime_start');
            $table->string('eventtime_end');
            $table->string('event_end');
            $table->integer('so_posoper_id');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_posoperplans');
    }
}
