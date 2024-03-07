<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Models\manager\Sectores;             // Modelo

use function Laravel\Prompts\alert;

class SectorController extends Controller {

    /* Ingresa una nueva descripcion. */
    public function NuevoSector (Request $request) {

        // Verifico que no exista la descripcion.
        $sector = Sectores::find($request->campoSector);
        if ($sector) {
            return response ()->json(['resultado' =>  Response::HTTP_CONFLICT]);
        }

        $sector = new Sectores();            // Crear variable.
        $sector->programa = $request->programa;
        $sector->usuario = $request->usuario;
        $sector->sector = $request->campoSector;
        $sector->save();                    // Graba el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    /* Modifica la descripcion. */
    public function ModificoSector (Request $request) {

        $sector = Sectores::find($request->campoId);
        $sector->sector = $request->campoSector;
        $sector->update();                    // Modifica el registro en la tabla.

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }

    public function ObtenerSectores (Request $request) {

        $ListaSector = DB::table('sectores')->orderBy('sector')->get();
        return response ()->json(['resultado' =>  Response::HTTP_OK, 'sectores' =>$ListaSector]);
    }

    /* Elimina una descripcion de la tabla. */
    public function BorroSector (Request $request) {

        // VERIFICAR ANTES DE BORRAR SI EL SECTOR ESTA EN USO EN LA TABLA TICKETS.
        // SI FUE USADO, NO PERMITIR BORRARLO Y EMITIR UN MENSAJE DEL PORQUE.

        $sector = Sectores::find($request->campoId);

        // Si existe el registro lo borra de la tabla.
        if ($sector)
            $sector->delete();

        // Retorna el resultado.
        return response ()->json(['resultado' =>  Response::HTTP_OK]);
    }
}
