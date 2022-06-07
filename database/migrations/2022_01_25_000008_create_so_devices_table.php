<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSodevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_devices', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->char('name', 100)->comment('название инструмента');
            $table->integer('rob')->comment('робот 1 да 0 нет ');
            $table->char('comment', 100)->comment('коммент');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_devices');
    }
}
