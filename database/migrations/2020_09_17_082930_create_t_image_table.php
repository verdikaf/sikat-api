<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_image', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('foto_bencana');
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
        Schema::dropIfExists('t_image');
    }
}
