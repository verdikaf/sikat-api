<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBencanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_bencana', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_bencana', 45);
            $table->string('lokasi', 255);
            $table->integer('id_laporan_bencana')->unsigned();
            $table->foreign('id_laporan_bencana')->references('id')->on('t_laporan_bencana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_bencana');
    }
}
