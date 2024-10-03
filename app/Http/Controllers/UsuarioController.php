<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Rol;

use function Laravel\Prompts\password;

class UsuarioController extends Controller
{
    //condultar que devuelva todos los resgistror
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    //consulta que devuelve  un registro especifico
    public function registro_unico($id)
    {
        $usuario = Usuario::find($id);
        return response()->json($usuario);
    }

    //crear o insertar datos a la tabla

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rol_id'=> 'required',
            'nombre' => 'requierd',
            'email' => 'requierd|email',
            'password' => 'requierd'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'error al crear usuario',
                
            ];
            return response()->json($data, 200);
        }
        $usuario = Usuario::create([
            
            'rol_id'=>3,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (!$usuario) {
            $data = [
                'message' => 'no se creo usuario, error',
                
            ];
            return response()->json($data);
        }
        $data = [
            'usuario' => $usuario,
            'status' => 200
        ];
        return response()->json($data);
    }

    /* public function store(Request $request){
        //validad los datos que seria desde el frontend
        $request->validate([
            'nombre'=>'required',
            'email'=>'required|email|unique:usuario',
            'password'=>'required'
        ]) ;

        //proceso con esta informacion
        $usuario= Usuario::create([
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        //devolver algo al usuario para ver si es exitoso o no
        return response()->json($usuario, 201);
    } */
}
