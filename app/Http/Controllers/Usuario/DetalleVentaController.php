<?php

namespace genericlothing\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use genericlothing\Http\Controllers\Controller;
use genericlothing\Venta;
use genericlothing\DetalleVenta;
use genericlothing\Envio;
use DB;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function destroy($cod_venta, $cod_producto, $cod_talla)
    {
        $DV =  DetalleVenta::whereColumn([
                     ['cod_venta', '=',  DB::raw((int)$cod_venta)],
                     ['cod_producto', '=', DB::raw((int)$cod_producto)],
                     ['cod_talla', '=',  DB::raw('\''.$cod_talla.'\'')]
                     ])->first();

        $DV->estado = "1";
        $DV->anularDv($DV);

        $DV =  DetalleVenta::whereColumn([
                    ['cod_venta', '=',  DB::raw((int)$cod_venta)],
                    ['estado', '=', DB::raw("0")]
                    ])->first();

        if ($DV == null) {
            $Venta = Venta::find($cod_venta);
            $Venta->estado = '2';
            $Venta->save();

            $Envio = Envio::find($cod_venta);
            $Envio->estado = '2';
            $Envio->save();

            return redirect()->route('misCompras')->with('status', 'La compra se ha anulado con éxito.');
        } else {
            return redirect()->route('detalleCompra', ['Venta' => $cod_venta]);
        }
    }
}