<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Exception;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioController extends Controller {

    /* LOGIN */
    public function Login (Request $request) {

        /* validaciones */
        $validator  = Validator::make($request->all(), ['usuario' => 'required' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST, 'mensaje' =>'Debe ingresar el nombre de Usuario.']);
        }

        $validator  = Validator::make($request->all(), ['password' => 'required' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST, 'mensaje' =>'Debe ingresar la Password.']);
        }

        try {
            $usuario = DB::table('usuarios')->where('usuario', $request->usuario)->first();

            if ($usuario)  {    // Si se encontro un usuario

                if (Hash::check($request->password, $usuario->password)){   // Si la passwrod es correcta
                    return response ()->json(['resultado' => Response::HTTP_OK, 'mensaje' =>'Login exitoso.', 'objUsuario'=>$usuario]);
                }
            }
            return response ()->json(['resultado' => Response::HTTP_UNAUTHORIZED, 'mensaje' =>'Usuario o password incorrecta !!!']);

        } catch (Exception $e)  {
            return response ()->json(['resultado' => Response::HTTP_INTERNAL_SERVER_ERROR, 'mensaje' =>'Error interno.']);
        }
    }

    /* USUARIO NUEVO */
    public function nuevoUsuario (Request $request) {

        // Controla USUARIO en blanco.
        $validator  = Validator::make($request->all(), ['usuario' => 'required|min:4|max:20' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
            'mensaje' =>'El usuario no puede estar en blanco.']);
        }

        // Controla que el USUARIO sea unico.
        $validator  = Validator::make($request->all(), ['usuario' => 'unique:usuarios' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
            'mensaje' =>'El usuario ya existe.']);
        }

        // Controla que el NOMBRE no sea blanco.
        $validator  = Validator::make($request->all(), ['nombre' => 'required|min:4|max:30' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
            'mensaje' =>'El nombre no puede estar en blanco.']);
        }

        // Controla que el APELLIDO no sea blanco.
        $validator  = Validator::make($request->all(), ['apellido' => 'required|min:4|max:50' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
            'mensaje' =>'El apellido no puede estar en blanco.']);
        }

        // Controla que la contraseña no puede estar en blanco.
        $validator  = Validator::make($request->all(), ['password' => 'required|min:6|max:80' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
            'mensaje' =>'La password no puede estar en blanco y debe tener como mínimo 6 caracteres.']);
        }

        // Controla que el EMAIL no este en blanco.
        $validator  = Validator::make($request->all(), ['email' => 'required|email|min:8|max:80' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
            'mensaje' =>'El email no puede estar en blanco, tiene que contener @ y debe tener entre 8 y 80 caracteres.']);
        }

        $usuario = new Usuario();
        $usuario->programa = $request->programa;
        $usuario->usuario = $request->usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->password = Hash::make($request->password);
        $usuario->email = $request->email;
        $usuario->habilitado = $request->habilitado;
        $usuario->seguridad = $request->seguridad;
        $usuario->tipoUsuario = $request->tipoUsuario;
        $usuario->save();

        return response ()->json(['resultado' =>  Response::HTTP_OK,
            'mensaje' =>'Se actualizó con éxito la base de datos.']);
    }

    public function ObtenerUsuarios(Request $request) {

        $ListaUsuarios = DB::table('usuarios')->orderBy('usuario')->get();
        return response ()->json(['status' =>  Response::HTTP_OK, 'usuarios' =>$ListaUsuarios]);
    }

}
