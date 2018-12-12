<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;
use genericlothing\Tienda;
use genericlothing\Producto;
use DB;
class AjaxController extends Controller
{
      public function ajaxBodegasFind(Request $Request)
      {
        $str = "";
        $Tienda = new Tienda;
        $Bodegas = $Tienda->find($Request->ctienda)->bodegas($Request->ctienda);

        foreach($Bodegas as $Bodega){
          if($Bodega->estado == "0"){
              $str = $str.'<option value="'.$Bodega->cod_bodega.'">'.$Bodega->direccion_bodega.'</option>';
          }
        }

        return $str;
      }

      public function ajaxUpdateCarro(Request $Request){
        $cant = 0;
        if (auth()->check()) {
          $cod_pedido = DB::table('pedido')
                        ->select('cod_pedido')
                        ->where('rut_cliente', '=', DB::raw('\''.auth()->user()->rut_cliente.'\''))
                        ->value('cod_pedido');

          $cant = DB::table('detalle-pedido')
                  ->select( DB::raw('sum(cantidad) as cant'))
                  ->where('cod_pedido','=', DB::raw((int)$cod_pedido))
                  ->value('cant');
          if ($cant == null) {
            $cant = 0;
          }
        }
        return $cant;
      }

      public function ajaxPecioProductoFind(Request $Request){
        $Producto = Producto::find($Request->codProducto);
        $precio_compra = '<input class="form-control" type="number" id="precio_compra" name="precio_compra" min="1" max="'.(int)$Producto->precio_venta.'" value="1">';
        return $precio_compra;
      }
}
