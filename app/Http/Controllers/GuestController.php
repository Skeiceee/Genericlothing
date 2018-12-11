<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;
use genericlothing\TipoProducto;
use genericlothing\Producto;
use genericlothing\Marca;
use genericlothing\Talla;
use DB;

class GuestController extends Controller
{

  public function index(){
    $Tallas = Talla::all();
    $TipoProductos = TipoProducto::all();
    $Marcas = Marca::all();

    $Productos = Producto::all();
    return view('Index.index',compact('TipoProductos','Productos','Marcas','Tallas'));
  }

  public function showProducto(Producto $Producto){
    $Tallas = Talla::all();
    $TipoProductos = TipoProducto::all();
    $Marcas = Marca::all();
    return view('Index.showProducto', compact('TipoProductos','Marcas','Tallas','Producto'));
  }

  public function filtrarTipoProducto($id){
      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();

      $TP = TipoProducto::find($id);

      $Productos = DB::table('producto')
                   ->whereColumn([
                   ['cod_tipo_producto', '=',  DB::raw((int)$TP->cod_tipo_producto)]
                   ])->get();

      return view('Index.index',compact('TipoProductos','Productos','Marcas','Tallas'));
  }

  public function filtrarMarca($id){
      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();

      $M = Marca::find($id);

      $Productos = DB::table('producto')
                   ->whereColumn([
                   ['cod_marca', '=',  DB::raw((int)$M->cod_marca)]
                   ])->get();

      return view('Index.index',compact('TipoProductos','Productos','Marcas','Tallas'));
  }

  public function filtrarTalla($id){
      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();

      $T = Talla::find($id);

      $Productos = $T->productos;

      return view('Index.index',compact('TipoProductos','Productos','Marcas','Tallas'));
  }

  public function filtrar(Request $Request){
    $Tallas = Talla::all();
    $TipoProductos = TipoProducto::all();
    $Marcas = Marca::all();

    list($minPrice, $maxPrice) = explode(';',$Request->range);

    if($Request->cod_de_tipo == -1 && $Request->cod_marca != -1) {
      $Productos = DB::table('producto')
                   ->whereColumn([
                   ['cod_marca', '=',  DB::raw('\''.$Request->cod_marca.'\'')],
                   ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                   ['precio_venta', '>=', DB::raw((int)$minPrice)]
                   ])->get();

    }else if( $Request->cod_marca == -1 && $Request->cod_de_tipo != -1) {
      $Productos = DB::table('producto')
                   ->whereColumn([
                   ['cod_tipo_producto', '=',  DB::raw((int)$Request->cod_de_tipo)],
                   ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                   ['precio_venta', '>=', DB::raw((int)$minPrice)]
                   ])->get();
    }else if( ($Request->cod_de_tipo == -1) && ($Request->cod_marca == -1) ) {
      $Productos = DB::table('producto')
                   ->whereColumn([
                   ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                   ['precio_venta', '>=', DB::raw((int)$minPrice)]
                   ])->get();
    }else{
      $Productos = DB::table('producto')
                   ->whereColumn([
                   ['cod_tipo_producto', '=',  DB::raw((int)$Request->cod_de_tipo)],
                   ['cod_marca', '=',  DB::raw('\''.$Request->cod_marca.'\'')],
                   ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                   ['precio_venta', '>=', DB::raw((int)$minPrice)]
                   ])->get();

    }
    if ($Productos->isEmpty()) {
      return  redirect()->route('guest')->with('status_error','La buscada no ha sido exitosa, no se encontro ningún productos con esas caracteristicas.');
    }

    return view('Index.index', compact('TipoProductos','Productos','Marcas','Tallas'));
  }

  public function redirectRegister(){
    return redirect()->route('register')->with('status_error','Usted no esta registrado, para poder agregar productos necesita una cuenta.');
  }
}
