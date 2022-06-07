<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palats', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->char('name',10)->comment('номер');
            $table->char('rean',10)->comment('1 реан 0 об');
            $table->char('countp',20)->comment('кол-во коек');
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
        Schema::dropIfExists('palats');
    }
}
