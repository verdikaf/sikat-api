<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_image extends Model
{
    protected $table = 't_image';
    protected $fillable = ['foto_bencana', 'id_laporan_bencana'];
    public $timestamps = false;
}
