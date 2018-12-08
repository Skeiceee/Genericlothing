<?php

namespace genericlothing\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use genericlothing\Http\Controllers\Controller;
use genericlothing\TipoProducto;
use genericlothing\Pedido;
use genericlothing\DetallePedido;
use DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TipoProductos = TipoProducto::all();
        $Pedido = Pedido::whereColumn([
                     ['rut_cliente', '=', DB::raw(auth()->user()->rut_cliente)]
                     ])->first();

        $DetallesPedido = DB::table('detalle-pedido')->where('cod_pedido', '=', $Pedido->cod_pedido)->get();

        return view('Home.carro', compact('TipoProductos', 'Pedido', 'DetallesPedido'));

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
    public function destroy($id)
    {
        //
    }
}