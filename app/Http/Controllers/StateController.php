<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use Yajra\DataTables\Facades\DataTables;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.estados.list');
    }

    public function list()
    {
         $data = State::all();
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
        $state = new State();
        $state->name = $request->name;
        $state->created_at = $now;
        $state->updated_at = $now;
        $state->saveOrFail();
        return response()->json([
            'data' => "El estado se agrego correctamente",
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
        $service = State::where('states.id', '=',  $request->id)->get();
        return response()->json([
          'data' => $service
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $state = State::find($request->id);
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $state->name = $request->name;
        $state->updated_at = $now;
        $state->save();
        return response()->json([
            'data' => "El estado se actualizo correctamente",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $state = State::find($request->id);
        $state->delete();
        return response()->json([
            'data' => "El estado se elimino correctamente",
        ], 200);
    }
}
