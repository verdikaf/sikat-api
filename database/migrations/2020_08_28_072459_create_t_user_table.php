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
            $table->Increments('id');
            $table->string('nama', 45);
            $table->string('jenis_kelamin', 15);
            $table->string('agama', 15);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('no_telp', 15);
            $table->string('alamat', 255);
            $table->string('password', 65);
            $table->string('foto', 255);
            $table->integer('id_role');
            $table->timestamps();
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
