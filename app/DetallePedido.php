<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = "Detalle-Pedido";
    protected $primaryKey = (
      ["cod_pedido",
       "cod_producto"]
    );
    public $incrementing = false;
    public $timestamps = false;
}
