<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_tim extends Model
{
    protected $table = 't_tim';
    protected $fillable = ['nama_pegawai', 'id_user', 'id_bencana'];
    public $timestamps = false;
}
