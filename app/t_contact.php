<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_contact extends Model
{
    protected $table = 't_contact';
    protected $fillable = ['nama', 'email', 'pesan'];
    public $timestamps = false;
}
