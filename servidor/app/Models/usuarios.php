<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_user',
        'dni',
        'contraseña',
        'name',
        'apeliido',
        'teléfono',
        'dirección',
        'password',
        'confirmar contraseña'
    ];
}
