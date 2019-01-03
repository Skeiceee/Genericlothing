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
use genericlothing\Pedido;
use genericlothing\Tienda;

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
     }
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
        $tipoVenta = $request->eor;

        $rut_cliente = auth()->user()->rut_cliente;
        $Pedido = DB::table('pedido')->where('rut_cliente', '=', $rut_cliente)->first();

        // Si $request->eor es igual a 1 es envio
        // Si $request->eor es igual a 2 es retiro en tienda

        //Logica para crear una venta ya sea envio o retiro en tienda.
        if ($tipoVenta == 1){
        //Codigo de creacion de envio.
            $precio_envio = rand(5000,10000);

            //Crear Venta
            $Venta = new Venta();
            $Venta->rut_cliente = $rut_cliente;
            $Venta->fecha = date('Y-m-d G:i:s');
            $Venta->total = $Pedido->total;
            $Venta->tipo = '0';
            $Venta->envio = '0';
            $Venta->estado = '0';
            $Venta->cod_tienda = 1;

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
            $Envio->cod_venta = $Venta->cod_venta;
            $Envio->cod_ciudad = $request->cod_ciudad;
            $Envio->telefono = auth()->user()->telefono;
            $Envio->precio_envio = $precio_envio;
            $Envio->estado = '0';

            $Envio->save();

        }else if($tipoVenta == 2){
        //Codigo de creacion de retiro en tienda.
            $TiendaRetiro = Tienda::whereColumn([
                         ['cod_ciudad', '=',  DB::raw((int)$request->cod_ciudad)]
                         ])->first();

            if ($TiendaRetiro == null) {
                $TiendaRetiro = Tienda::find(1);
            }

            $Venta = new Venta();
            $Venta->rut_cliente = $rut_cliente;
            $Venta->fecha = date('Y-m-d G:i:s');
            $Venta->total = $Pedido->total;
            $Venta->tipo = '0';
            $Venta->envio = '1';
            $Venta->estado = '0';
            $Venta->cod_tienda = $TiendaRetiro->cod_tienda;

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
                            ['cod_talla', '=',  DB::raw('\''.$DetallePedido->cod_talla.'\'')],
                            //['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                            ['cod_tienda', '=', DB::raw((int)$TiendaRetiro->cod_tienda)]
                            ])->first();

                if ($EP == null) {
                    $EP =  ExistenciaProducto::whereColumn([
                                ['cod_producto', '=',  DB::raw((int)$DetallePedido->cod_producto)],
                                ['cod_talla', '=',  DB::raw('\''.$DetallePedido->cod_talla.'\'')]
                                //['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                                //['cod_tienda', '=', DB::raw((int)$TiendaRetiro->cod_tienda)]
                                ])->first();
                }

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
        }
         //Codigo igual entre los dos si existe.

        //Limpiando pedido
        $P = Pedido::find($Pedido->cod_pedido);
        $P->total = 0;
        $P->save();

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
    public function destroy($cod_venta)
    {
        $Venta = Venta::find($cod_venta);
        $Venta->estado = '2';
        $Venta->save();

        if ($Venta->envio == 0) {
            $Envio = Envio::find($cod_venta);
            $Envio->estado = '2';
            $Envio->save();
        }

        $DetallesVenta = DB::table('detalle-venta')->where('cod_venta', '=', $cod_venta)->get();

        foreach ($DetallesVenta as $DetalleVenta) {
            $DV =  DetalleVenta::whereColumn([
                        ['cod_venta', '=',  DB::raw((int)$cod_venta)],
                        ['estado', '=', DB::raw("0")]
                        ])->first();
            if ($DV != null) {
                $DV->estado = "1";
                $DV->anularDv($DV);
            }

            //Aumentar Existencia luego de anular
            if ($Venta->envio == 0) {
                $EP =  ExistenciaProducto::whereColumn([
                            ['cod_producto', '=',  DB::raw((int)$DetalleVenta->cod_producto)],
                            ['cod_talla', '=',  DB::raw('\''.$DetalleVenta->cod_talla.'\'')]
                            //['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                            //['cod_tienda', '=', DB::raw((int)$request->cod_tienda)]
                            ])->first();
                $EP->cantidad = ($EP->cantidad) + ($DetalleVenta->cantidad);
                $EP->updated_at = date('Y-m-d G:i:s');
                $EP->updateEp($EP);
            }
            elseif ($Venta->envio == 1) {
                $EP =  ExistenciaProducto::whereColumn([
                            ['cod_producto', '=',  DB::raw((int)$DetalleVenta->cod_producto)],
                            ['cod_talla', '=',  DB::raw('\''.$DetalleVenta->cod_talla.'\'')],
                            //['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                            ['cod_tienda', '=', DB::raw((int)$Venta->cod_tienda)]
                            ])->first();

                if ($EP == null) {
                    $EP =  ExistenciaProducto::whereColumn([
                                ['cod_producto', '=',  DB::raw((int)$DetalleVenta->cod_producto)],
                                ['cod_talla', '=',  DB::raw('\''.$DetalleVenta->cod_talla.'\'')]
                                //['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                                //['cod_tienda', '=', DB::raw((int)$TiendaRetiro->cod_tienda)]
                                ])->first();
                }

                $EP->cantidad = ($EP->cantidad) + ($DetalleVenta->cantidad);
                $EP->updated_at = date('Y-m-d G:i:s');
                $EP->updateEp($EP);
            }
        }

        return redirect()->route('misCompras')->with('status', 'La compra se ha anulado con éxito.');
    }
}
