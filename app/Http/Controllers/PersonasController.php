<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function index()
    {
        try {
            $personas = Persona::all(); // O cualquier otro código que uses para obtener personas
            return view('personas.index', compact('personas'));
        } catch (\Exception $e) {
            // Si ocurre algún error, lo mostramos en el log
            \Log::error('Error al recuperar las personas: ' . $e->getMessage());
            return response()->view('errors.500', [], 500); // O devuelve un error personalizado
        }
    }


    public function create()
    {
        $estudios = ['Ninguno', 'Tecnico', 'Licenciatura', 'Maestria', 'Doctorado', 'Otro'];
        $tiposAsist = ['Estudiante', 'Docente', 'Academico', 'Publico general'];
        return view('personas.createPersona', compact('estudios', 'tiposAsist')); // Ruta corregida
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoPat' => 'required|string|max:255',
            'apellidoMat' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date', // Corrección en validación
            'telefono' => 'nullable|string',
            'estado' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'sexo' => 'nullable|string',
            'estudio' => 'nullable|string',
            'tipoAsist' => 'nullable|string',
        ]);

        Persona::create([
            'nombre' => $request->nombre,
            'apellidoPat' => $request->apellidoPat,
            'apellidoMat' => $request->apellidoMat,
            'estudio' => $request->estudio,
            'tipoAsist' => $request->tipoAsist,
            'fechaNacimiento' => $request->fechaNacimiento,
            'datos_adicio' => json_encode([
                'telefono' => $request->telefono,
                'estado' => $request->estado, // Corrección aquí
                'ciudad' => $request->ciudad,
                'sexo' => $request->sexo
            ]),
        ]);

        return redirect()->route('personas.index')->with('success', 'Persona creada con éxito'); // Ruta corregida
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $persona->update([
            'nombre' => $request->nombre,
            'apellidoPat' => $request->apellidoPat,
            'apellidoMat' => $request->apellidoMat,
            'estudio' => $request->estudio,
            'tipoAsist' => $request->tipoAsist,
            'datos_adicio' => json_encode([
                'telefono' => $request->telefono,
                'estado' => $request->estado, // Corrección aquí
                'ciudad' => $request->ciudad,
                'sexo' => $request->sexo
            ]),
        ]);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada'); // Ruta corregida
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada');
    }
}
