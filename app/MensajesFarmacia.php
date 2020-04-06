<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MensajesFarmacia extends Model
{
    use SoftDeletes;

    protected $table = 'mensajes_farmacias';

    protected $fillable = [
        'parteuno',     
        'partedos',
        'partetres',
    ];
}
