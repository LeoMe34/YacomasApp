<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('personas', PersonasController::class);

