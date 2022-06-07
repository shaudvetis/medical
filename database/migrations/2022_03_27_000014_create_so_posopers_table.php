<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoposopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_posopers', function (Blueprint $table) {
            $table->integer('nib')->comment('Код лечебной карт');
            $table->integer('p_oper')->comment('название операции');
            $table->integer('p_payout_id')->comment('наз направления с p_payouts');
            $table->integer('ref')->comment('Код физЛица eleks');
            $table->char('tnib', 100)->comment('Номер истории болезни для стационара');
           
            $table->date('pos_d')->comment('Дата поступления в стационар');
            $table->date('out_d')->comment('Дата выписки из стационара');
            $table->date('d_posplan')->comment('плановая дата поступленияя');
            $table->date('d_operplan')->comment('плановая дата операции');
            $table->date('d_outplan')->comment('плановая дата выписки ');
            $table->char('posdiacode', 15)->comment('Код диагноза для плановой операции');
            $table->char('user_id', 15)->comment('Код хирурга');
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
        Schema::dropIfExists('so_posopers');
    }
}
