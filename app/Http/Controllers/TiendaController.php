<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Ciudad;
use genericlothing\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
          $this->middleware('auth');
          $this->middleware('permisos');
     }
    public function index()
    {   
        $Tiendas = Tienda::all();
        return view('Tienda.index',compact('Tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Ciudades = Ciudad::all();
        return view('Tienda.create',compact('Ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Tienda = new Tienda();

        $Tienda->cod_ciudad = $request->input('ciudad');
        $Tienda->nom_tienda = $request->input('nom_tienda');
        $Tienda->direccion_tienda = $request->input('direccion_tienda');
        $Tienda->estado = 0;
        $Tienda->save();

        return 'Guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
