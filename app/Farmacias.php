<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Farmacias extends Model
{
    use SoftDeletes;

    protected $table = 'farmacias';

    protected $fillable = [
        'nombre',     
        'direccion',
        'deshabilitado',
    ];

}
