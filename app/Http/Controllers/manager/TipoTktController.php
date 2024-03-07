<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\manager\TiposTkt;             // Modelo

class TipoTktController extends Controller {

    /* Ingresa una nueva descripcion. */
    public function NuevoTipoTkt (Request $request) {

        // Verifico que no exista la descripcion.
        $tipoTkt = TiposTkt::find($request->campoTipoTkt);
        if ($tipoTkt) {
            return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
        }

        $tipotkt = new TiposTkt();            // Crear variable.
        $tipotkt->usuario = $request->usuario;
        $tipotkt->programa = $request->programa;
        $tipotkt->tipoTkt = $request->campoTipoTkt;
        $tipotkt->save();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    public function ModificoTipoTkt (Request $request) {

        $tipotkt = TiposTkt::find($request->campoId);
        $tipotkt->tipotkt = $request->campoTipoTkt;
        $tipotkt->update();                    // Modifica el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Obtiene la lista de descripciones. */
    public function ObtenerTiposTkt (Request $request) {

        $listaTipoTkt = DB::table('tiposTkt')->orderBy('tipoTkt')->get();
        return response ()->json(['resultado' =>  Response::HTTP_OK, 'tiposTkt' =>$listaTipoTkt]);
    }

    /* Elimina una descripcion de la tabla. */
    public function BorroTipoTkt (Request $request) {

        // VERIFICAR ANTES DE BORRAR SI EL TIPO TICKET ESTA EN USO EN LA TABLA TICKETS.
        // SI FUE USADO, NO PERMITIR BORRARLO Y EMITIR UN MENSAJE DEL PORQUE.

        $tipoTkt = TiposTkt::find($request->campoId);

        // Si existe el registro lo borra de la tabla.
        if ($tipoTkt)
            $tipoTkt->delete();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }
}
