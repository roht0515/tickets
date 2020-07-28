<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Priority;

class PrioritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.prioridad.list');
    }

    public function list()
    {
         $data = Priority::all();
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
        $priority = new Priority();
        $priority->name = $request->name;
        $priority->level_priority = $request->nivel_prioridad;
        $priority->created_at = $now;
        $priority->updated_at = $now;
        $priority->saveOrFail();
        return response()->json([
            'data' => "La prioridad se agrego correctamente",
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
        $priority = Priority::where('priorities.id', '=',  $request->id)->get();
        return response()->json([
          'data' => $priority
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
        $priority = Priority::find($request->id);
        $priority->name = $request->name;
        $priority->level_priority = $request->nivel_prioridad;
        $priority->updated_at = $now;
        $priority->save();
        return response()->json([
            'data' => "La prioridad se actualizo correctamente",
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
        $priority = Priority::find($request->id);
        $priority->delete();
        return response()->json([
            'data' => "El servicio se elimino correctamente",
        ], 200);
    }
}
