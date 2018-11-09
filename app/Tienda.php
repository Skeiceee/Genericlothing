<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = "Tienda";
    protected $primaryKey = "cod_tienda";
    public $timestamps = false;

    public function bodegas(){
      return $this->hasMany('genericlothing\Bodega','cod_tienda');
    }
}
