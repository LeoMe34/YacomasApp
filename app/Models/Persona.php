<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
    protected $casts = [
        'datos_adicio' => 'array', // Asegura que se trate como un array
    ];

    protected $fillable = [
        'nombre',
        'apellidoPat',
        'apellidoMat',
        'fechaNacimiento',
        'telefono',
        'estado',
        'ciudad',
        'sexo',
        'estudio',
        'tipoAsist',
        'datos_adicio'
    ];
}

