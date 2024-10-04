<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

 //CRUD de usuario
Route::get('/',[UsuarioController::class,'index'] )->name('usuario.index');///listar todos los usuario
Route::get('/usuario/{id}',[UsuarioController::class,'registro_unico'])->name('usuario.show');//mostrar usuario por id
Route::post('/usuario',[UsuarioController::class,'store'])->name('usaurio.create');//crear nuevo usuario
Route::delete('/usuario/{id}',[UsuarioController::class,'destroy'])->name('usuario.destroy');//borrar un usuario
Route::put('/usuario/{id}',[UsuarioController::class,'update'])->name('usuario.update');//actuaizar usuario

//
