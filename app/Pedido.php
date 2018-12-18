<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pedido extends Model
{
    protected $table = "Pedido";
    protected $primaryKey = "cod_pedido";
    protected $fillable = ['rut_cliente', 'fecha', 'total'];
    public $timestamps = false;
}
