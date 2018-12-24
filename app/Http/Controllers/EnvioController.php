<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Envio;
use genericlothing\Venta;
use Illuminate\Http\Request;
use DB;
class EnvioController extends Controller
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
        return view('Envio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Envio = Envio::find($id);

        $DetallesVentas = DB::table('detalle-venta')->where('cod_venta', '=', $Envio->cod_venta)->get();
        return view('Envio.show', compact('Envio','DetallesVentas'));
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

    public function confirmationEnvio(Envio $Envio){
      $nomCiudad = DB::table('ciudad')
                      ->select('nom_ciudad')
                      ->where('cod_ciudad', '=', $Envio->cod_ciudad)->value('nom_ciudad');

      $Venta = DB::table('venta')
              ->where('cod_venta', '=', $Envio->cod_venta)
              ->first();

      $DetallesVentas = DB::table('detalle-venta')
                          ->select('cod_producto', 'cod_talla', 'precio_venta', 'subtotal', 'cantidad')
                          ->where('cod_venta', '=', $Envio->cod_venta)->get();

      return view('Envio.envio', compact('Envio', 'DetallesVentas', 'nomCiudad','Venta'));
    }

    public function destroy(Envio $Envio){

      $Venta = Venta::whereColumn([
                   ['cod_venta', '=',  DB::raw((int)$Envio->cod_venta)]
                   ])->first();

      $Venta->estado = 1;
      $Venta->save();
      $Envio->estado = 1;
      $Envio->save();

      return redirect()->route('envio.index')->with('status','El envio ha sido concretado exitosamente.');
    }
}
