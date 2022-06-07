<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSheduleoperblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheduleoperblocks', function (Blueprint $table) {
            $table->id();
            $table->integer('p_operblock_id');
            $table->integer('npp');
            $table->string('color');
            $table->string('comment');
            $table->string('work_start');
            $table->string('work_end');
            $table->string('worktime_start');
            $table->string('worktime_end');
            $table->string('hours');
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
        Schema::dropIfExists('sheduleoperblocks');
    }
}
