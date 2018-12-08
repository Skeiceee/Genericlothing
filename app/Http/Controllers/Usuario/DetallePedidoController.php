<?php

namespace genericlothing\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use genericlothing\Http\Controllers\Controller;
use genericlothing\Producto;
use genericlothing\Pedido;
use genericlothing\DetallePedido;
use genericlothing\TipoProducto;
use DB;

class DetallePedidoController extends Controller
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
    public function store(Request $request)
    {
      //TODO: Agregar StoreDetallePedidoRequest.php para validar que se haya seleccionado una talla

      $Producto = Producto::find($request->cod_producto);
      $cod_talla = $request->cod_talla;
      $rut = auth()->user()->rut_cliente;
      $Pedido = DB::table('pedido')->where('rut_cliente', '=', $rut)->first();

      $DP =  DetallePedido::whereColumn([
                   ['cod_pedido', '=',  DB::raw((int)$Pedido->cod_pedido)],
                   ['cod_producto', '=', DB::raw((int)$request->cod_producto)]
                   ])->first();

      if($DP != null){
          if($DP->cod_talla == $request->cod_talla){
              $DP->cantidad = $DP->cantidad + 1;
              $DP->subtotal = $DP->subtotal + $Producto->precio_venta;

              $DP->updateDp($DP);
          }//TODO: Poner aca la condicion cuando se agrega el mismo producto pero la talla es distinta.
      }else{
          $DP = new DetallePedido();

          $DP->cod_pedido = $Pedido->cod_pedido;
          $DP->cod_producto = $request->cod_producto;
          $DP->cantidad = 1;
          $DP->precio_venta = $Producto->precio_venta;
          $DP->subtotal = $Producto->precio_venta;
          $DP->estado = "0";
          $DP->cod_talla = $request->cod_talla;

          $DP->saveDp($DP);
      }

      return redirect()->route('carro')->with('status','El producto se ha agregado al carro correctamente.');
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
