<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.servicios.list');
    }

     /**
     * Display a listing of services.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
         $data = Service::all();
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

    public function store(Request $request)
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $device = new Service();
        $device->name = $request->name;
        $device->created_at = $now;
        $device->updated_at = $now;
        $device->saveOrFail();
        return response()->json([
            'data' => "El servicio se agrego correctamente",
        ], 200);
    }

    public function show(Request $request)
    {
        $service = Service::where('services.id', '=',  $request->id)->get();
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
    public function edit(Request $request)
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
        $service = Service::find($request->id);
        $service->name = $request->name;
        $service->updated_at = $now;
        $service->save();
        return response()->json([
            'data' => "El servicio se actualizo correctamente",
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
        $Service = Service::find($request->id);
        $Service->delete();
        return response()->json([
            'data' => "El servicio se elimino correctamente",
        ], 200);
    }

}
