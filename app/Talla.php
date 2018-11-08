<?php

namespace genericlothing;

use ExistenciaProducto;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = "Talla";
    protected $primaryKey = "cod_talla";
    protected $keyType = 'string';
    public $timestamps = false;

    public function bodegas(){
      return $this->belongsToMany('genericlothing\Bodega','existencia_producto','cod_talla','cod_bodega');
    }

    public function productos(){
      return $this->belongsToMany('genericlothing\Producto','existencia_producto','cod_talla','cod_producto');
    }

    public function tiendas(){
      return $this->belongsToMany('genericlothing\Tienda','existencia_producto','cod_talla','cod_tienda');
    }


}
