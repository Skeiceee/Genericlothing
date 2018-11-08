<?php

namespace genericlothing;

use ExistenciaProducto;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = "Bodega";
    protected $primaryKey = "cod_bodega";
    public $timestamps = false;

    public function productos(){
      return $this->belongsToMany('genericlothing\Producto','existencia_producto','cod_bodega','cod_producto');
    }
    public function tallas(){
      return $this->belongsToMany('genericlothing\Talla','existencia_producto','cod_bodega','cod_talla');
    }
    public function tiendas(){
      return $this->belongsToMany('genericlothing\Tienda','existencia_producto','cod_bodega','cod_tienda');
    }

}
