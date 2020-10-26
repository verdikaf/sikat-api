<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_bantuan extends Model
{
    protected $table = 't_bantuan';
    protected $fillable = ['jenis_bantuan', 'jumlah', 'id_logistik', 'id_bencana'];
    public $timestamps = false;
}
