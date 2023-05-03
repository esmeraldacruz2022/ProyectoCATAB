<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['servicios']= Servicios::paginate(5);
        return view('servicios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
     $campos=[
        'Servicio'=>'required|string|max:100',
        'Detalle'=>'required|string|max:100',
        'CostoDeServicio'=>'required|string|max:100',
        'Estado'=>'required|string|max:100',
     ];
$mensaje=[
'required'=>'El :attribute es requerido'

];
$this->validate($request,$campos,$mensaje);




        // $datosServicio=request()->all();
     $datosServicio= request()->except('_token');
     Servicios::insert($datosServicio);
     return response()->json($datosServicio);
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $servicio=Servicios::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {
        //
        $campos=[
            'Servicios'=>'required|string|max:100',
            'Detalles'=>'required|string|max:100',
            'CostoDeServicio'=>'required|string|max:100',
            'Estado'=>'required|string|max:100',
         ];
    $mensaje=[
    'required'=>'El :attribute es requerido'

    ];
    $this->validate($request,$campos,$mensaje);







        $datosServicio= request()->except(['_token','_method']);
        Servicios::where('id','=',$id)->update($datosServicio);


        $servicio=Servicios::findOrFail($id);
        // return view('servicios.edit', compact('servicio'));
        return redirect('servicios')->with('mensaje','editado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        Servicios::destroy($id);
         return redirect('servicios');
    }
}
