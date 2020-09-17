<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLaporanBencanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_laporan_bencana', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('jenis_bencana', 45);
            $table->string('lokasi', 45);
            $table->string('verifikasi', 45);
            $table->string('kalkulasi', 45);
            $table->dateTime('waktu');
            $table->integer('jml_korban');
            $table->integer('jml_meninggal');
            $table->text('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_laporan_bencana');
    }
}
