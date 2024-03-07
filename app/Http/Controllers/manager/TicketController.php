<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Exception;
use App\Models\manager\Tickets;

class TicketController extends Controller {

    public function NuevoTicket (Request $request) {

        /* validaciones */
        $validator  = Validator::make($request->all(), ['ticket' => 'required' ]);
        if ($validator->fails()) {
         return response ()->json(['resultado' =>  Response::HTTP_BAD_REQUEST,
         'mensaje' =>'El Ticket no debe estar en blanco.']);
        }

        $ticket = new tickets;
        $ticket->programa = $request->programa;
        $ticket->usuario = $request->usuario;
        $ticket->finicio = $request->finicio;
        $ticket->ffin = $request->ffin;
        $ticket->tipoTktID = $request->tipoTktID;
        $ticket->usuarioID = $request->usuarioID;
        $ticket->sectorID = $request->sectorID;
        $ticket->prioridadID = $request->prioridadID;
        $ticket->estadoID = $request->estadoID;
        $ticket->calificacionID = $request->calificacionID;
        $ticket->asunto = $request->asunto;
        $ticket->descripcion = $request->descripcion;
        $ticket->save();

        return response ()->json(['resultado' =>  Response::HTTP_OK,
            'mensaje' =>'Se actualizó con éxito la base de datos.']);
        }

        public function ObtenerTickets(Request $request) {

//            $ListaTicket = Tickets::all();
            $ListaTicket = DB::table('tickets')->orderBy('id')->get();
            return response ()->json(['status' =>  Response::HTTP_OK, 'tickets' =>$ListaTicket]);
        }

}
