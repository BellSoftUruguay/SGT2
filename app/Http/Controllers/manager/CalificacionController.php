<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\manager\Calificaciones;                       // Modelo

class CalificacionController extends Controller{

    /* Ingresa una nueva descripcion. */
    public function NuevaCalificacion (Request $request) {

        // Verifico que no exista la descripcion.
        $calificacion = Calificaciones::find($request->campoCalificacion);
        if ($calificacion) {
            return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
        }

        $calificacion = new Calificaciones();            // Crear variable.
        $calificacion->programa = $request->programa;
        $calificacion->usuario = $request->usuario;
        $calificacion->calificacion = $request->campoCalificacion;
        $calificacion->save();                    // Graba el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Modifica la descripcion. */
    public function ModificoCalificacion (Request $request) {

        $calificacion = Calificaciones::find($request->campoId);
        $calificacion->calificacion = $request->campoCalificacion;
        $calificacion->update();                    // Modifica el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Obtiene la lista de descripciones. */
    public function ObtenerCalificaciones (Request $request) {

        $ListaCalificacion = DB::table('calificaciones')->orderBy('calificacion')->get();
        return response ()->json(['resultado' => Response::HTTP_OK, 'calificaciones' => $ListaCalificacion]);
    }

    /* Elimina una descripcion de la tabla. */
    public function BorroCalificacion (Request $request) {

        // VERIFICAR ANTES DE BORRAR SI LA CALIFICACION ESTA EN USO EN LA TABLA TICKETS.
        // SI FUE USADO, NO PERMITIR BORRARLO Y EMITIR UN MENSAJE DEL PORQUE.

        $calificacion = Calificaciones::find($request->campoId);

        // Si existe el registro lo borra de la tabla.
        if ($calificacion)
            $calificacion->delete();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }
}
