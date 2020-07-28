<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Tickets;
use App\TypeClient;

class clientes extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('welcome', compact('services'));
    }

    public function indexSelect($id)
    {
        $TypeClient = TypeClient::all();
        $services = Service::where('services.id', '=', $id)->get();
        return view('selection', compact('TypeClient', 'services'));
    }

    public function imprimir($id){

        $ticket = Tickets::join('services', 'services.id', '=', 'tickets.service_id')
        ->select('tickets.id as id', 'tickets.codigo as codigo', 'tickets.fecha as fecha', 'tickets.hora as hora', 'services.name as atencion')
        ->where('tickets.id', '=', $id)
        ->get();
        
        $pdf = \PDF::loadView('pdf.ticket2', compact('ticket'));
        return $pdf->download('Ticket.pdf');
    }

    public function generate(Request $request) {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $ticket =  new Tickets();
        $ticket->codigo = "2";
        $ticket->fecha = $now;
        $ticket->hora = $now;
        $ticket->type_client_id = $request->type_client;
        $ticket->state_id = 1; 
        $ticket->service_id = $request->service;
        $ticket->created_at = $now;
        $ticket->updated_at = $now;
        $ticket->saveOrFail();
        $newCode = $this->getCodeService($request->service) . $this->getCode($request->type_client) . $ticket->id;
        $ticket->codigo = $newCode;
        $ticket->saveOrFail();
        return response()->json([
            'data' => $ticket,
        ], 200);
    }

    public function getCode($type_client) {
        if($type_client == 1)
            return  "T";
        if($type_client == 2)
            return "M";
        if($type_client == 3)
            return "D";
        if($type_client == 4)
            return "MP";
        if($type_client == 5)
            return "O";
        if($type_client == 6)
            return "G";
    }
    public function getCodeService($service) {
        if($service == 1)
            return  "CN";
        if($service == 2)
            return "RT";
        if($service == 3)
            return "PT";
        if($service == 4)
            return "F";
    }
}
