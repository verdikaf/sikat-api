<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_menu extends Model
{
    protected $table = 't_menu';
    protected $fillable = ['nama_menu', 'url', 'id_role'];
    public $timestamps = false;
}
