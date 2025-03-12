<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{

    // Método para listar los usuarios
    public function index(Request $request)
    {
        $rango = $request->query('rango');

        if ($rango) {
            $users = User::where('rango', $rango)->get();
        } else {
            $users = User::all();
        }
        return view('auth.adminList', compact('users', 'rango'));
    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.adminEdit', compact('user'));
    }

    // Método para actualizar los datos del usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'rango' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('auth.adminList')->with('success', 'Usuario actualizado correctamente.');
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('auth.adminList')->with('success', 'Usuario eliminado correctamente.');
    }
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }


    // Manejar autenticación
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->rango === 'Total' || $user->rango == 'Parcial' || $user->rango = 'Cajero') {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
