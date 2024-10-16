<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_usuario', 
        'nombre',
        'apellidos',
        'edad',
        'telefono',
        'correo',
        'direccion',
        'password'
    ];
}
