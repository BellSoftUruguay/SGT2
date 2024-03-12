<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller {

    /* LOGIN */
    public function Login (Request $request) {

        /* Validaciones */
        $validator  = Validator::make($request->all(), ['usuario' => 'required' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST, 'mensaje' => 'usuario invalido']);
        }

        $validator  = Validator::make($request->all(), ['password' => 'required' ]);
        if ($validator->fails()) {
            return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST, 'mensaje' => 'psw invalido']);
        }

        try {
            $usuario = DB::table('usuarios')->where('usuario', $request->usuario)->first();

            if ($usuario)  {    // Si se encontro un usuario

    //           if (Hash::check($request->password, $usuario->password)) {   // Si la passwrod es correcta
                if ($request->password== $usuario->password){   // Si la passwrod es correcta
                    return response ()->json(['resultado' => Response::HTTP_OK, 'objUsuario'=>$usuario]);
                }
            }
            return response ()->json(['resultado' => Response::HTTP_UNAUTHORIZED]);

        } catch (Exception $e)  {
            return response ()->json(['resultado' => Response::HTTP_INTERNAL_SERVER_ERROR]);
        }
    }

        /* USUARIO NUEVO */
        public function NuevoUsuario (Request $request) {

            // Recupero registro por nombre de usuario.
            $usuario = DB::table('usuarios')->where('usuario', $request->usuario)->first();

            // Verifico que no exista el usuario.
            if ($usuario) {
                return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
            }

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

            DB::table('usuarios')->insert([
                'programa' => $request->programa,
                'usuario' => $request->usuario,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'habilitado' => $request->habilitado,
                'seguridad' => $request->seguridad,
                'categoriaUsuario' => $request->CategoriUsuario
            ]);

            return response ()->json(['resultado' =>  Response::HTTP_OK]);
        }

        public function ObtenerUsuarios(Request $request) {

            $ListaUsuarios = DB::table('usuarios')->orderBy('usuario')->get();
            return response ()->json(['resultado' => Response::HTTP_OK, 'usuarios' => $ListaUsuarios]);
        }

        public function ModificoUsuario (Request $request) {

            DB::table('usuarios')->where('usuario', $request->usuario)->update([
                'programa' => $request->programa,
                'usuario' => $request->usuario,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'habilitado' => $request->habilitado,
                'seguridad' => $request->seguridad,
                'categoriaUsuario' => $request->CategoriUsuario
            ]);

            // Retorna el resultado.
            return response ()->json(['resultado' =>  Response::HTTP_OK]);
        }

        /* Elimina una descripcion de la tabla. */
        public function BorroUsuario (Request $request) {

            // Recupero registro por nombre de usuario.
            $usuario = DB::table('usuarios')->where('usuario', $request->usuario)->first();

            // Si existe el registro lo borra de la tabla.
            if ($usuario)
                $usuario->delete();

            // Retorna el resultado.
            return response ()->json(['resultado' =>  Response::HTTP_OK]);

        }
}
