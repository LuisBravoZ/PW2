<?php

namespace App\Http\Controllers;

use App\Models\DatoPersonal;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DatoPersonalController extends Controller
{
    //ver los datos personales de los usuarios
    public function index(){
        $usuario = Auth()->user();
        return response()->json($usuario->DatoPersonal);
    }
    //ver dato personal de un usuario
    public function show($id){
        $datop = DatoPersonal::find($id);
        return response()->json($datop);
    }
    //agregar un dato personal a el usuario


}
