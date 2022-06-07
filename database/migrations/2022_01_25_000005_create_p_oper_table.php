<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_opers', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->integer('p_payout')->comment('наз направления с p_payouts');
            $table->char('u2name',100)->comment('Название операции');
            $table->decimal('su_price',9,2)->comment('Цена операции');
            $table->decimal('timegos',3,1)->comment('Длительность госпит');
            $table->decimal('timeoper',3,1)->comment('Длительность опер');
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
        Schema::dropIfExists('p_opers');
    }
}
