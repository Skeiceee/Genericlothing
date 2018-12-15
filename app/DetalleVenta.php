<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;
use DB;

class DetalleVenta extends Model
{
    protected $table = "Detalle-Venta";
    protected $primaryKey = (
      ["cod_venta",
       "cod_producto",
       "cod_talla"]
    );
    public $incrementing = false;
    public $timestamps = false;

    public function saveDv(DetalleVenta $DV){
      DB::table('detalle-venta')->insert(
          [
            'cod_venta' => $DV->cod_venta,
            'cod_producto' => $DV->cod_producto,
            'cod_talla' => $DV->cod_talla,
            'cantidad' => $DV->cantidad,
            'precio_venta' => $DV->precio_venta,
            'subtotal' => $DV->subtotal,
            'estado' => $DV->estado
          ]
        );
    }

    public function anularDv(DetalleVenta $DV){
      DB::table('detalle-venta')
          ->where('cod_venta', '=',  DB::raw((int)$DV->cod_venta))
          ->where('cod_producto', '=', DB::raw((int)$DV->cod_producto))
          ->where('cod_talla', '=', DB::raw('\''.$DV->cod_talla.'\''))
          ->update(
            [
            'estado' => $DV->estado
            ]
          );
    }
}
