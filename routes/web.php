<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[UsuarioController::class,'index'] );
