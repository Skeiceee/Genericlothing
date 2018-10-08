<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = "Bodega";
    protected $primaryKey = "cod_bodega";
    public $timestamps = false;
}
