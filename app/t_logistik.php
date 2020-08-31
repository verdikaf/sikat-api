<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_logistik extends Model
{
    protected $table = 't_logistik';
    protected $fillable = ['id_kategori', 'nama_barang', 'stok', 'id_supplier', 'status', 'expired'];
    public $timestamps = false;
}
