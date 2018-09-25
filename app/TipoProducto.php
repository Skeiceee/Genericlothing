<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
  protected $table = "Tipo-Producto";
  protected $primaryKey = "cod_tipo_producto";
  public $timestamps = false;
}
