<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\manager\Prioridades;             // Modelo

class PrioridadController extends Controller {

    /* Ingresa una nueva descripcion. */
    public function NuevaPrioridad (Request $request) {

        // Verifico que no exista la descripcion.
        $prioridad = Prioridades::find($request->campoPrioridad);
        if ($prioridad) {
            return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
        }

        $prioridad = new Prioridades();            // Crear variable.
        $prioridad->programa = $request->programa;
        $prioridad->usuario = $request->usuario;
        $prioridad->prioridad = $request->campoPrioridad;
        $prioridad->save();                    // Graba el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Modifica la descripcion. */
    public function ModificoPrioridad (Request $request) {

        $prioridad = Prioridades::find($request->campoId);
        $prioridad->prioridad = $request->campoPrioridad;
        $prioridad->update();                    // Modifica el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    public function ObtenerPrioridades (Request $request) {

        $ListaPrioridad = DB::table('prioridades')->orderBy('prioridad')->get();
        return response ()->json(['resultado' =>  Response::HTTP_OK, 'prioridades' =>$ListaPrioridad]);
    }

    /* Elimina una descripcion de la tabla. */
    public function BorroPrioridad (Request $request) {

        // VERIFICAR ANTES DE BORRAR SI LA PRIORIDAD ESTA EN USO EN LA TABLA TICKETS.
        // SI FUE USADO, NO PERMITIR BORRARLO Y EMITIR UN MENSAJE DEL PORQUE.

        $prioridad = Prioridades::find($request->campoId);

        // Si existe el registro lo borra de la tabla.
        if ($prioridad)
            $prioridad->delete();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }
}
