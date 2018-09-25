<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
  protected $table = "Ciudad";
  protected $primaryKey = "cod_ciudad";
  public $timestamps = false;
}
