
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoPoscardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_poscards', function (Blueprint $table) {
            $table->integer('nibcard')->comment('код физ лица');
            $table->char('pac_fio',50)->comment('фио');
            $table->char('pacfam', 15)->comment('фамилия');
            $table->char('pacname',15)->comment('имя');
            $table->char('pacsurname',15)->comment('отчество');
            $table->decimal('pac_sex', 1,0)->comment('пол 1-м 2-ж');
            $table->date('pac_born')->comment('дата рождения');
            $table->decimal('ambulatid',3,0)->comment('код амб')->nullable();
            $table->decimal('cntrycode',3,0)->comment('код страны')->nullable();
            $table->decimal('oblcode',3,0)->comment('код обл')->nullable();
            $table->decimal('obcitycode',3,0)->comment('код города')->nullable();
            $table->decimal('regoblcode',3,0)->comment('код района')->nullable();
            $table->decimal('regcitcode',3,0)->comment('')->nullable();
            $table->char('countur',50)->comment('текст')->nullable();
            $table->char('street',50)->comment('улица')->nullable();
            $table->decimal('numhouse',4,0)->comment('дом')->nullable();
            $table->char('numkorp',8)->comment('корп')->nullable();
            $table->decimal('numflat',4,0)->comment('квартира')->nullable();
            $table->char('w_tlph',15)->comment('телефон')->nullable();
            $table->char('email',40)->comment('емаил')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_poscards');
    }
}
