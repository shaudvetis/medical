<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSorisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_risks', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->char('name', 100)->comment('название риска');
            $table->char('u2', 100)->comment('описание ');
            $table->char('comment', 100)->comment('коммент');
            $table->integer('npp')->comment('название цифровое');
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
        Schema::dropIfExists('so_risks');
    }
}
