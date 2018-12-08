<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;
use DB;

class DetallePedido extends Model
{
    protected $table = "Detalle-Pedido";
    protected $primaryKey = (
      ["cod_pedido",
       "cod_producto"]
    );
    public $incrementing = false;
    public $timestamps = false;

    public function updateDp(DetallePedido $DP){
      DB::table('detalle-pedido')
          ->where('cod_pedido', '=',  DB::raw((int)$DP->cod_pedido))
          ->where('cod_producto', '=', DB::raw((int)$DP->cod_producto))
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
            'cantidad' => $DP->cantidad,
            'precio_venta' => $DP->precio_venta,
            'subtotal' => $DP->subtotal,
            'estado' => $DP->estado,
            'cod_talla' => $DP->cod_talla
          ]
        );
    }
}
