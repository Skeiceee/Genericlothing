<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class ExistenciaProducto extends Model
{
    protected $table = "Existencia_producto";
    protected $primaryKey = (
      ["cod_producto",
       "cod_talla",
       "cod_bodega",
       "cod_tienda"]
    );

    public $incrementing = false;

}
