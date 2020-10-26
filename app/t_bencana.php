<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_bencana extends Model
{
    protected $table = 't_bencana';
    protected $fillable = ['nama_bencana', 'lokasi', 'id_laporan_bencana'];
    public $timestamps = false;
}
