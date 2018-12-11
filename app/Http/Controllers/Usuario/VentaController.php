<?php

namespace genericlothing\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreVentaRequest;
use genericlothing\Http\Controllers\Controller;
use genericlothing\Venta;
use genericlothing\DetalleVenta;
use genericlothing\DetallePedido;
use genericlothing\ExistenciaProducto;
use genericlothing\Envio;

use DB;

class VentaController extends Controller
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
    public function store(StoreVentaRequest $request)
    {
        $precio_envio = rand(5000,10000);
        $rut_cliente = auth()->user()->rut_cliente;

        $maxCod = DB::table('venta')->select(DB::raw('max(cod_venta) as maxCod'))->value('maxCod');
        $maxCod++;

        $Pedido = DB::table('pedido')->where('rut_cliente', '=', $rut_cliente)->first();

        //Crear Venta
        $Venta = new Venta();
        $Venta->cod_venta = $maxCod;
        $Venta->rut_cliente = $rut_cliente;
        $Venta->fecha = date('Y-m-d G:i:s');
        $Venta->total = $Pedido->total;
        $Venta->tipo = '0';
        $Venta->envio = '0';
        $Venta->estado = '0';

        $Venta->save();

        $DetallesPedido = DB::table('detalle-pedido')->where('cod_pedido', '=', $Pedido->cod_pedido)->get();
        foreach ($DetallesPedido as $DetallePedido) {
            //Crear detalle-venta
            $DV = new DetalleVenta();

            $DV->cod_venta = $Venta->cod_venta;
            $DV->cod_producto = $DetallePedido->cod_producto;
            $DV->cod_talla = $DetallePedido->cod_talla;
            $DV->cantidad = $DetallePedido->cantidad;
            $DV->precio_venta = $DetallePedido->precio_venta;
            $DV->subtotal = $DetallePedido->subtotal;
            $DV->estado = '0';

            $DV->saveDv($DV);

            //Disminuir cantidad en Existencia-producto
            $EP =  ExistenciaProducto::whereColumn([
                         ['cod_producto', '=',  DB::raw((int)$DetallePedido->cod_producto)],
                         ['cod_talla', '=',  DB::raw('\''.$DetallePedido->cod_talla.'\'')]
                         //['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                         //['cod_tienda', '=', DB::raw((int)$request->cod_tienda)]
                         ])->first();

            $EP->cantidad = ($EP->cantidad) - ($DetallePedido->cantidad);
            $EP->updated_at = date('Y-m-d G:i:s');
            $EP->updateEp($EP);

            //Limpiar carrito
            $DP =  DetallePedido::whereColumn([
                         ['cod_pedido', '=',  DB::raw((int)$Pedido->cod_pedido)],
                         ['cod_producto', '=', DB::raw((int)$DetallePedido->cod_producto)],
                         ['cod_talla', '=',  DB::raw('\''.$DetallePedido->cod_talla.'\'')]
                         ])->first();

            $DP->deleteDp($DP);
        }

        $Envio = new Envio();
        $Envio->cod_venta = $maxCod;
        $Envio->cod_ciudad = $request->cod_ciudad;
        $Envio->telefono = auth()->user()->telefono;
        $Envio->precio_envio = $precio_envio;
        $Envio->estado = '0';

        $Envio->save();

        return redirect()->route('home')->with('status', 'La compra se ha realizado con éxito.');
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
