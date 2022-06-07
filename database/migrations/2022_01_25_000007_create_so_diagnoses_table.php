<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSodiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_diagnoses', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->char('name', 100)->comment('название диагноза');
            $table->integer('p_payout_id')->comment('наз направления с p_payouts');
            $table->char('comment',100)->comment('направление');
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
        Schema::dropIfExists('so_diagnoses');
    }
}
