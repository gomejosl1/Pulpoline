<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentroMedico extends Model
{
       use SoftDeletes;

       protected $table = 'centro_medico';

       protected $fillable = [
        'nombre',     
        'direccion',
        'deshabilitado',
    ];

}
