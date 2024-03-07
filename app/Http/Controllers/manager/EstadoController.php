<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\manager\Estados;             // Modelo

class EstadoController extends Controller {

    /* Ingresa una nueva descripcion. */
    public function NuevoEstado (Request $request) {

        // Verifico que no exista la descripcion.
        $estado = Estados::find($request->CampoEstado);
        if ($estado) {
            return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
        }

        $estado = new Estados();            // Crear variable.
        $estado->programa = $request->programa;
        $estado->usuario = $request->usuario;
        $estado->estado = $request->campoEstado;
        $estado->save();                    // Graba el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    public function ModificoEstado (Request $request) {

        $estado = Estados::find($request->campoId);
        $estado->estado = $request->campoEstado;
        $estado->update();                    // Modifica el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Obtiene la lista de descripciones. */
    public function ObtenerEstados (Request $request) {

        $ListaEstado = DB::table('estados')->orderBy('estado')->get();
        return response ()->json(['resultado' =>  Response::HTTP_OK, 'estados' =>$ListaEstado]);
    }

    /* Elimina una descripcion de la tabla. */
    public function BorroEstado (Request $request) {

        // VERIFICAR ANTES DE BORRAR SI EL ESTADO ESTA EN USO EN LA TABLA TICKETS.
        // SI FUE USADO, NO PERMITIR BORRARLO Y EMITIR UN MENSAJE DEL PORQUE.

        $estado = Estados::find($request->campoId);

        // Si existe el registro lo borra de la tabla.
        if ($estado)
            $estado->delete();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }
}
