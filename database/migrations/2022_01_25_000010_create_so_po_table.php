<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_pos', function (Blueprint $table) {
            $table->integer('nib')->comment('Код лечебной карт');
            $table->integer('nibcard')->comment('Код физЛица so_poscard.nibcard');
            $table->integer('p_payout_id')->comment('наз направления с p_payouts');
            $table->integer('PatientID')->comment('Код физЛица eleks');
            $table->char('tnib', 100)->comment('Номер истории болезни для стационара');
            $table->char('pac_fio', 50)->comment('ФИО');
            $table->char('pacfam', 15)->comment('Фамилия');
            $table->char('pacname', 15)->comment('Имя');
            $table->char('pacsurname', 15)->comment('Отчество');
            $table->integer('pac_sex')->comment('Пол  1- М, 2 - Ж');
            $table->integer('ister')->comment('терапевт  1, 2 - нетерапевт');
            $table->date('pac_born')->comment('Дата рождения');
            $table->char('w_tlph', 15)->comment('phone');
            $table->date('pos_d')->comment('Дата поступления в стационар');
            $table->date('out_d')->comment('Дата выписки из стационара');
            $table->date('d_posplan')->comment('плановая дата поступленияя');
            $table->date('d_operplan')->comment('плановая дата операции');
            $table->date('d_outplan')->comment('плановая дата выписки ');
            $table->char('posdiacode', 15)->comment('Код диагноза для плановой операции');
            $table->integer('p_oper', 15)->comment('справ опер');
            $table->char('user_id', 15)->comment('Код хирурга');
            $table->char('indcode', 220)->comment('индиф код');
            $table->date('oper')->comment('дата выполненой операции ');
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
        Schema::dropIfExists('so_pos');
    }
}
