<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = "Talla";
    protected $primaryKey = "cod_talla";
    public $timestamps = false;
}
