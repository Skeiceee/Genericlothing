<?php

namespace genericlothing;

use ExistenciaProducto;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = "Producto";
  protected $primaryKey = "cod_producto";
  public $timestamps = false;

  public function tallas(){
    return $this->belongsToMany('genericlothing\Talla','existencia_producto','cod_producto','cod_talla');
  }

  public function bodegas(){
    return $this->belongsToMany('genericlothing\Bodega','existencia_producto','cod_producto','cod_bodega');
  }

  public function tiendas(){
    return $this->belongsToMany('genericlothing\Tienda','existencia_producto','cod_producto','cod_tienda');
  }
  public function existencias(){
    return $this->belongsToMany('genericlothing\Producto','existencia_producto','cod_producto','cod_producto')->withPivot('proveedor','precio_compra','cantidad','created_at', 'updated_at');
  }
}
