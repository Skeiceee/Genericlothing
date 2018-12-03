<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;
use genericlothing\Ciudad;
use genericlothing\TipoProducto;
class HomeController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $TipoProductos = TipoProducto::all();
      return view('Home.index',compact('TipoProductos'));
    }

    public function configuracion_user(){
      $TipoProductos = TipoProducto::all();
      $Ciudades = Ciudad::all();
      return view('Usuario.Common.configuracion_user',compact('Ciudades','TipoProductos'));
    }
}
