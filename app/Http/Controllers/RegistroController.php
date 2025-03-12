<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegistroController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.adminRegistro');
    }

    // Registrar al usuario
    public function register(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Se valida la confirmación de la contraseña
            'rango' => 'required|string',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rango' => $request->rango,
            'password' => Hash::make($request->password), // Hashear la contraseña
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('auth.adminList')->with('success', 'Usuario creado correctamente');
    }
}
