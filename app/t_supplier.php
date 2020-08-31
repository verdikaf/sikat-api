<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_supplier extends Model
{
    protected $table = 't_supplier';
    protected $fillable = ['nama', 'alamat'];
}
