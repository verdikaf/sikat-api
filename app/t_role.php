<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_role extends Model
{
    protected $table = 't_role';
    protected $fillable = ['nama_role'];
    public $timestamps = false;
}
