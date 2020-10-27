<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_tim', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_pegawai', 45);
            $table->bigInteger('id_user')->unsigned();
            $table->integer('id_bencana')->unsigned();
            $table->foreign('id_user')->references('id')->on('t_user');
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
        Schema::dropIfExists('t_tim');
    }
}
