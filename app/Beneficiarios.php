<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiarios extends Model
{
        use SoftDeletes;

        protected $table = 'beneficiarios';

        protected $fillable = [
        'nombre',     
        'cedula',
        'telefono',
        'correo',
        'id_farmacia',
        'id_centro_medico',
        'fecha_dialisis',
        'hora_dialisis',
        'fecha_retiro',
    ];

    public function farmacia()
    {
        return $this->belongsTo('App\Farmacias', 'id_farmacia');
    }

    public function centro_medico()
    {
        return $this->belongsTo('App\CentroMedico', 'id_centro_medico');
    }
}
