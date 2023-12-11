<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = "programa";

    protected $fillable = [
        'id','nombre','id_temporada','nombre','visible','created_at','updated_at'
    ];
}
