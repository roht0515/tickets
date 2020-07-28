<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use Yajra\DataTables\Facades\DataTables;

class TicketController extends Controller
{
    public function index()
    {
        return view('atencion.list');
    }

    public function list()
    {
         $data = Tickets::join('services', 'services.id', '=', 'tickets.service_id')
         ->join('states', 'states.id', '=', 'tickets.state_id')
         ->join('type_client', 'type_client.id', '=' ,'tickets.type_client_id')
         ->orderBy('type_client.priority_id')
         ->select('tickets.id as id','tickets.codigo  as codigo', 'type_client.name as type_client', 'states.name as state', 'services.name as service_id', 'tickets.created_at as created_at')
         ->get();
        return DataTables::of($data)
            ->addColumn('DT_RowId', function ($row) {
                $row = $row->id;
                return $row;
            })
            ->make(true);
    }
}
