<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBantuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_bantuan', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('jenis_bantuan', 45);
            $table->integer('jumlah');
            $table->integer('id_logistik')->unsigned();
            $table->foreign('id_logistik')->references('id_logistik')->on('t_logistik');
            $table->integer('id_bencana')->unsigned();
            $table->foreign('id_bencana')->references('id')->on('t_bencana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_bantuan');
    }
}
