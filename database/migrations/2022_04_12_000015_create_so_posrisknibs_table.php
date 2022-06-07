<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoposrisknibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_posrisknibs', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->integer('so_risk_id')->comment('ид с табл so_risk риска');
            $table->char('nib', 100)->comment('пациент ниб');
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
        Schema::dropIfExists('so_posrisknibs');
    }
}
