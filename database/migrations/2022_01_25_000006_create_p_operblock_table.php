<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoperblockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_operblocks', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->char('opername', 100)->comment('название опербл');
            $table->integer('npp')->comment('npp');
            $table->decimal('startwork',3,2)->comment('начало раб');
            $table->decimal('dendworkr',3,2)->comment('конец раб');
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
        Schema::dropIfExists('p_operblocks');
    }
}
