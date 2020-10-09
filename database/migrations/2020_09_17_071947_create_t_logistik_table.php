<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLogistikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_logistik', function (Blueprint $table) {
            $table->Increments('id_logistik');
            $table->integer('id_kategori')->unsigned();
            $table->string('nama_barang', 45);
            $table->integer('stok');
            $table->integer('id_supplier')->unsigned();
            $table->string('status', 45);
            $table->date('expired');
            $table->timestamp('created_at');
            $table->foreign('id_kategori')->references('id')->on('t_kategori_logistik');
            $table->foreign('id_supplier')->references('id')->on('t_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_logistik');
    }
}