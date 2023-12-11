<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $table = "temporada";

    protected $fillable = [
        'id','anio_inicio','anio_fin','visible','nombre','created_at','updated_at'
    ];
}
