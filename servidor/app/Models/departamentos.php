<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_departamento');
    }

    public function eventos()
    {
        return $this->hasManyThrough(Evento::class, User::class, 'id_departamento', 'id_creador');
    }
}

