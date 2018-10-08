<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = "Tienda";
    protected $primaryKey = "cod_tienda";
    public $timestamps = false;
}
