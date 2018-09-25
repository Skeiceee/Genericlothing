<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = "Producto";
  protected $primaryKey = "cod_producto";
  public $timestamps = false;
}
