<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MensajesDialisis extends Model
{
    use SoftDeletes;

    protected $table = 'mensajes_dialisis';

    protected $fillable = [
        'parteuno',     
        'partedos',
        'partetres',
        'partecuatro',
    ];
}
