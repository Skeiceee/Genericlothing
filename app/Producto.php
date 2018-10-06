<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = "producto";
  protected $primaryKey = "cod_producto";
  public $timestamps = false;
}
