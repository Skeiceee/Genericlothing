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
    return $this->belongsToMany('genericlothing\Talla','existencia-producto','cod_producto','cod_talla');
  }

  public function bodegas(){
    return $this->belongsToMany('genericlothing\Bodega','existencia-producto','cod_producto','cod_bodega');
  }

  public function tiendas(){
    return $this->belongsToMany('genericlothing\Tienda','existencia-producto','cod_producto','cod_tienda');
  }
  public function existencias(){
    return $this->belongsToMany('genericlothing\Producto','existencia-producto','cod_producto','cod_producto')->withPivot('cod_talla','proveedor','precio_compra','cantidad','created_at', 'updated_at');
  }
}
