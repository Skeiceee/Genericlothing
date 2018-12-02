<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = "Detalle-Venta";
    protected $primaryKey = (
      ["cod_venta",
       "cod_producto"]
    );
    public $incrementing = false;
    public $timestamps = false;
}
