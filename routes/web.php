<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsersController::class, 'login']);
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/registroAdmin', [RegistroController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro
Route::post('/registroAdmin', [RegistroController::class, 'register']);
Route::resource('personas', PersonasController::class);

// SECCION ADMINISTRADORES - RUTAS 
Route::get('/admin/dashboard', function () {
    return view('layouts.adminBarra');
})->name('admin.dashboard')->middleware('auth');
Route::get('/users', [UsersController::class, 'index'])->name('auth.adminList'); // Listar usuarios
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('auth.adminEdit'); // Formulario de edición
Route::put('/users/{id}', [UsersController::class, 'update'])->name('auth.update'); // Guardar cambios
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('auth.destroy'); // Eliminar usuario

Route::get('/user/dashboard', function () {
    return view('layouts.app');
})->name('user.dashboard')->middleware('auth');

Route::get('/menuAdmin', function () {
    return view('menuAdmin');
})->name('menuAdmin')->middleware('auth');

Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
