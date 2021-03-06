<?php

namespace genericlothing\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use genericlothing\Http\Controllers\Controller;
use genericlothing\TipoProducto;
use genericlothing\Talla;
use genericlothing\Marca;
use genericlothing\Ciudad;

class PagoController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $TipoProductos = TipoProducto::all();
        $Marcas = TipoProducto::all();
        $Tallas = Talla::all();
        $Ciudades = Ciudad::all();
        return view('Home.pago', compact('TipoProductos','DetallesPedido','Marcas','Tallas','Ciudades'));
    }
}
