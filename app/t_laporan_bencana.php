<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_laporan_bencana extends Model
{
    protected $table = 't_laporan_bencana';
    protected $fillable = ['jenis_bencana', 'lokasi', 'verifikasi', 'kalkulasi', 'waktu', 'jml_korban', 'jml_meninggal', 'keterangan'];
    public $timestamps = false;
}
