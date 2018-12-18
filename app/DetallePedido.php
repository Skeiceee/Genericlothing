<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;
use DB;

class DetallePedido extends Model
{
    protected $table = "Detalle-Pedido";
    protected $primaryKey = (
      ["cod_pedido",
       "cod_producto",
       "cod_talla"]
    );
    public $incrementing = false;
    public $timestamps = false;

    public function updateDp(DetallePedido $DP){
      DB::table('detalle-pedido')
          ->where('cod_pedido', '=',  DB::raw((int)$DP->cod_pedido))
          ->where('cod_producto', '=', DB::raw((int)$DP->cod_producto))
          ->where('cod_talla', '=', DB::raw('\''.$DP->cod_talla.'\''))
          ->update(
            [
            'cantidad' => $DP->cantidad,
            'subtotal' => $DP->subtotal
            ]
          );
    }

    public function saveDp(DetallePedido $DP){
      DB::table('detalle-pedido')->insert(
          [
            'cod_pedido' => $DP->cod_pedido,
            'cod_producto' => $DP->cod_producto,
            'cod_talla' => $DP->cod_talla,
            'cantidad' => $DP->cantidad,
            'precio_venta' => $DP->precio_venta,
            'subtotal' => $DP->subtotal,
          ]
        );
    }

    public function deleteDp(DetallePedido $DP){
        DB::table('detalle-pedido')
            ->where('cod_pedido', '=',  DB::raw((int)$DP->cod_pedido))
            ->where('cod_producto', '=', DB::raw((int)$DP->cod_producto))
            ->where('cod_talla', '=', DB::raw('\''.$DP->cod_talla.'\''))
            ->delete();
    }
}
