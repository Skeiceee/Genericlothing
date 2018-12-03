<?php

namespace genericlothing;

use Illuminate\Database\Eloquent\Model;
use DB;
class Tienda extends Model
{
    protected $table = "Tienda";
    protected $primaryKey = "cod_tienda";
    public $timestamps = false;

    public function bodegas($ctienda){
      return DB::table('bodega as e')
             ->select('e.cod_bodega', 'e.direccion_bodega', 'e.estado')
             ->where(function ($query) use ($ctienda){
               $query->where('e.cod_tienda', '=', $ctienda);
             })->get();
    }

}
