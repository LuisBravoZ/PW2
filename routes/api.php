<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */
Route::get('/',[UsuarioController::class,'index'] );
Route::get('/registro_unico/{id}',[UsuarioController::class,'registro_unico']);
Route::post('/store',[UsuarioController::class,'store']);
