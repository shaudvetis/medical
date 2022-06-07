<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdolgnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_dolgns', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->char('dolgname', 100)->comment('название напр');
            $table->char('dolgnameoper',100)->comment('операцион спец');
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
        Schema::dropIfExists('p_dolgns');
    }
}
