<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Venta;
use Illuminate\Http\Request;
use DB;
class VentaController extends Controller
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
        return view('Venta.index');
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
    public function destroy(Venta $Venta)
    {
        $Venta = Venta::whereColumn([
                     ['cod_venta', '=',  DB::raw((int)$Venta->cod_venta)]
                     ])->first();

        $Venta->estado = 1;
        $Venta->save();

        return redirect()->route('venta.index')->with('status','La venta ha sido concretada exitosamente.');
    }

    public function confirmationVenta(Venta $Venta){
        $DetallesVentas = DB::table('detalle-venta')->where('cod_venta', '=', $Venta->cod_venta)->get();
        return view('Venta.venta', compact('Venta','DetallesVentas'));
    }
}
