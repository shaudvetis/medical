<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanbagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planbags', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->date('data')->comment('data');
            $table->integer('palat_id')->comment('ид кровати с табл palats');
            $table->integer('bag_id')->comment('id койки с bags');
            $table->integer('bag_name')->comment('имя койки с bags');
            $table->integer('palat_name')->comment('имя койки с bags');
            $table->integer('nib1')->comment('pacient');
            $table->integer('nib2')->comment('pacient');
            $table->integer('oper')->comment('0 свободна 1 поступил 2 выписка 3 хирург одн-д');
            $table->integer('pac_sex1')->comment('пол1');
            $table->integer('pac_sex2')->comment('пол2');
            $table->integer('pac_fio1')->comment('фио1');
            $table->integer('pac_fio2')->comment('фио2');
            $table->integer('bron')->comment('1 da 0 net');
            $table->integer('color')->comment('цвет');
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
        Schema::dropIfExists('planbags');
    }
}

