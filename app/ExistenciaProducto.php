<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;
use DB;

class ExistenciaProducto extends Model
{
    protected $table = "Existencia-Producto";
    protected $primaryKey = (
      ["cod_producto",
       "cod_talla",
       "cod_bodega",
       "cod_tienda"]
    );

    public $incrementing = false;

    public function updateEp(ExistenciaProducto $EP){
      DB::table('existencia-producto')
          ->where('cod_producto', '=',  DB::raw((int)$EP->cod_producto))
          ->where('cod_talla', '=',  DB::raw('\''.$EP->cod_talla.'\''))
          ->where('cod_bodega', '=', DB::raw((int)$EP->cod_bodega))
          ->where('cod_tienda', '=', DB::raw((int)$EP->cod_tienda))
          ->update(
            [
            'cantidad' => $EP->cantidad,
            'updated_at' => $EP->updated_at
            ]
          );
    }

    public function updateEpPc(ExistenciaProducto $EP){
      DB::table('existencia-producto')
          ->where('cod_producto', '=',  DB::raw((int)$EP->cod_producto))
          ->where('cod_talla', '=',  DB::raw('\''.$EP->cod_talla.'\''))
          ->where('cod_bodega', '=', DB::raw((int)$EP->cod_bodega))
          ->where('cod_tienda', '=', DB::raw((int)$EP->cod_tienda))
          ->update(
            [
            'cantidad' => $EP->cantidad,
            'updated_at' => $EP->updated_at,
            'precio_compra' => $EP->precio_compra
            ]
          );
    }

    public function saveEp(ExistenciaProducto $EP){
      DB::table('existencia-producto')->insert(
          [
            'cod_producto' => $EP->cod_producto,
            'cod_talla' => $EP->cod_talla,
            'cod_bodega' => $EP->cod_bodega,
            'cod_tienda' => $EP->cod_tienda,
            'proveedor' => $EP->proveedor,
            'precio_compra' => $EP->precio_compra,
            'cantidad' => $EP->cantidad,
            'created_at' => $EP->created_at,
            'updated_at' => $EP->updated_at
          ]
        );
    }


}
