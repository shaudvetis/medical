<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_bags', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->integer('palat_id')->comment('ид с табл palats');
            $table->char('palat_name',100)->comment('имя с табл palats');
            $table->decimal('num_bags',9,2)->comment('№ палаты нпп');
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
        Schema::dropIfExists('p_bags');
    }
}
