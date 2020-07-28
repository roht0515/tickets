<?php

namespace App\Http\Controllers;

use App\Priority;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\TypeClient;

class ClientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::all();
        return view('administracion.tipo_cliente.list', compact('priorities'));
    }

    public function list()
    {
         $data = TypeClient::join('priorities', 'priorities.id', '=', 'type_client.priority_id')
         ->select('type_client.id as id', 'type_client.name as name', 'priorities.level_priority as priority_id', 'type_client.created_at','type_client.updated_at');
        return DataTables::of($data)
            ->addColumn('DT_RowId', function ($row) {
                $row = $row->id;
                return $row;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $typeClient = new TypeClient();
        $typeClient->name = $request->name;
        $typeClient->priority_id = $request->priority_id;
        $typeClient->created_at = $now;
        $typeClient->updated_at = $now;
        $typeClient->saveOrFail();
        return response()->json([
            'data' => "El tipo de cliente se agrego correctamente",
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $typeClient = TypeClient::where('type_client.id', '=',  $request->id)->get();
        return response()->json([
          'data' => $typeClient
     ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $typeClient = TypeClient::find($request->id);
        $typeClient->name = $request->name;
        $typeClient->priority_id = $request->priority_id;
        $typeClient->updated_at = $now;
        $typeClient->save();
        return response()->json([
            'data' => "El tipo de cliente se actualizo correctamente",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $typeClient = TypeClient::find($request->id);
        $typeClient->delete();
        return response()->json([
            'data' => "El tipo de cliente se elimino correctamente",
        ], 200);
    }
}
