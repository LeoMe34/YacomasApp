<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoPat' => 'required|string|max:255',
            'apellidoMat' => 'required|string|max:255',
            'fechaNacimiento' => 'required|dateTime',
            'telefono' => 'required|string',
            'estado' => 'required|string',
            'ciudad' => 'required|string',
            'sexo' => 'required|string',
            'estudio' => 'nullable|required|string',
            'tipoAsist' => 'nullable|required|string',

        ]);

        Persona::create([
            'nombre' => $request->nombre,
            'apellidoPat' => $request->apellidoPat,
            'apellidoMat' => $request->apellidoMat,
            'estudio' => $request->estudio,
            'tipoAsist' => $request->tipoAsist,
            'datos_adicio' => [
                'telefono' => $request->telefono,
                'estado' => $request->direccion,
                'ciudad' => $request->ciudad,
                'sexo' => $request->sexo
            ],
        ]);

        return redirect()->route('personas.index')->with('success', 'Persona creada con éxito');
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
            'datos_adicio' => [
                'telefono' => $request->telefono,
                'estado' => $request->direccion,
                'ciudad' => $request->ciudad,
                'sexo' => $request->sexo
            ],
        ]);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada');
    }
}
