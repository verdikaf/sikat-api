<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 45);
            $table->string('jenis_kelamin', 15);
            $table->string('agama', 15);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('no_telp', 15);
            $table->text('alamat');
            $table->string('password', 65);
            $table->string('foto', 255);
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id')->on('t_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_user');
    }
}
