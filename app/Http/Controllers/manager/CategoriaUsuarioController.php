<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\manager\CategoriasUsuarios;             // Modelo

class CategoriaUsuarioController extends Controller {

    /* Ingresa una nueva descripcion. */
    public function NuevaCategoriaUsuario (Request $request) {

        // Verifico que no exista la descripcion.
        $categoriaUsuario = CategoriasUsuarios::find($request->campoCategoriaUsuario);
        if ($categoriaUsuario) {
            return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
        }

        $categoriaUsuario = new CategoriasUsuarios();            // Crear variable.
        $categoriaUsuario->usuario = $request->usuario;
        $categoriaUsuario->programa = $request->programa;
        $categoriaUsuario->categoria = $request->campoCategoriaUsuario;
        $categoriaUsuario->save();                    // Graba el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    public function ModificoCategoriaUsuario (Request $request) {

        $categoriaUsuario = CategoriasUsuarios::find($request->campoId);
        $categoriaUsuario->categoria = $request->campoCategoriaUsuario;
        $categoriaUsuario->update();                    // Modifica el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Obtiene la lista de descripciones. */
    public function ObtenerCategoriasUsuarios (Request $request) {

        $ListaCategoriaUsuario = DB::table('categoriasUsuarios')->orderBy('categoria')->get();
        return response ()->json(['resultado' =>  Response::HTTP_OK, 'categoriasUsuarios' =>$ListaCategoriaUsuario]);
    }

    /* Elimina una descripcion de la tabla. */
    public function BorroCategoriaUsuario (Request $request) {

        // VERIFICAR ANTES DE BORRAR SI LA CATEGORIA ESTA EN USO EN LA TABLA USUARIOS.
        // SI FUE USADO, NO PERMITIR BORRARLO Y EMITIR UN MENSAJE DEL PORQUE.

        $categoriaUsuario = CategoriasUsuarios::find($request->campoId);

        // Si existe el registro lo borra de la tabla.
        if ($categoriaUsuario)
            $categoriaUsuario->delete();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }
}
