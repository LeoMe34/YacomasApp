<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidoPat', 'apellidoMat', 'fechaNacimiento', 'datos_adicio', 'estudio', 'tipoAsist']; // sexo, estado, ciudad, estudio, cargo, telefono 
    // estudio es SOLO para ponentes
    // tipoAsist es SOLO para Asistentes
    protected $casts = [
        'datos_adicio' => 'array', // Convierte JSON en array automáticamente
    ];
    //
}
