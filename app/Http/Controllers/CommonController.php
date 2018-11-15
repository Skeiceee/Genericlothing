<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Talla;
use genericlothing\Bodega;
use genericlothing\Producto;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function __construct(){
         $this->middleware('auth');
         $this->middleware('permisos');
    }
    public function createExistenciaProducto(Producto $Producto)
    {
      $Tallas = Talla::all();
      $Bodegas = Bodega::all();
      return view('Existencia-Producto.create',compact('Tallas','Bodegas','Producto'));
    }
}
