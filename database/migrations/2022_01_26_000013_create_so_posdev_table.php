<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoposdevTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_posdevs', function (Blueprint $table) {
            $table->id()->comment('ид');
            $table->integer('nib')->comment('nib');
            $table->integer('so_device_id')->comment('оборуд ид ');
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
        Schema::dropIfExists('so_posdevs');
    }
}
