<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



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
            'nombre' => 'required',
            'email' => 'required|email|unique:usuario',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error al crear usuario',
                'errors' => $validator->errors(),
            ], 400); // Cambié el código de estado a 400 para indicar que hubo un error de validación
        }

        $usuario = Usuario::create([
            'rol_id' => 3, //$request->rol_id, // Aquí se usa el rol_id enviado en la solicitud
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Es recomendable encriptar la contraseña
        ]);

        if (!$usuario) {
            return response()->json([
                'message' => 'No se pudo crear el usuario, error en el servidor',
            ], 500); // Código de error de servidor
        }

        return response()->json([
            'usuario' => $usuario,
            'message' => 'Usuario creado exitosamente',
            'status' => 201
        ], 201); // Código de estado 201 para indicar creación exitosa
    }



    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id); //obtener usuario por id
        //para evr si existe tal usuario
        if (!$usuario) {
            return response()->json(['mensaje' => 'usuario no encontrado']);
        };
        //si exite el usuario vamos a validar los datos
        $validator = Validator::make(
            $request->all(),
            [
                'rol_id' => 'sometimes|exists:rol,id',
                'nombre' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:usuarios,email,' . $usuario->id,
                'password' => 'sometimes|min:6'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->error(), 400);
        }
        //editar los campos del usuario
        $usuario->update([
            'rol_id' => $request->rol_id ?? $usuario->rol_id,
            'nombre' => $request->nombre ?? $usuario->nombre,
            'email' => $request->email ?? $usuario->email,
            'password' => $request->password ? bcrypt($request->password) : $usuario->password,
        ]);

        return response()->json($usuario, 200);
    }

    //Eliminar usuario
    public function destroy($id)
    {

        // Buscar el usuario por ID
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Borrado lógico del usuario (soft delete)
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }



    //login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MiToken')->plainTextToken; // Crear el token
            return ['token' => $token->plainTextToken]; 
            return response()->json([
                'token' => $token,
                'user' => $user
            ], 200);
        }

        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

}
