<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    protected $table = "produccion";

    protected $fillable = [
        'id','codigo_asignatura','nombre_curso','eap','tipo_diseno','plan',
        'tipo_asignatura','ciclo','modalidad','formato_p','formato_sp','formato_d','duracion_p',
        'duracion_sp','duracion_d',       
        'visible','created_at','updated_at'
    ];
}
