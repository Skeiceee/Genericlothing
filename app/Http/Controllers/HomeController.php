<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;
use genericlothing\Ciudad;
use genericlothing\TipoProducto;
use genericlothing\Producto;
use genericlothing\Marca;
use genericlothing\Talla;
use DB;
class HomeController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $Tallas = Talla::all();
      $Productos = Producto::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();
      return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
    }

    public function configuracion_user(){
      $Marcas = Marca::all();
      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Ciudades = Ciudad::all();
      return view('Usuario.Common.configuracion_user',compact('Ciudades','TipoProductos','Marcas','Tallas'));
    }

    public function showProducto(Producto $Producto){
      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();
      return view('Home.showProducto',compact('TipoProductos','Producto','Marcas','Tallas'));
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
        return  redirect()->route('home')->with('status_error','La buscada no ha sido exitosa, no se encontro ningún productos con esas caracteristicas.');
      }

      return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
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

        return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
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

        return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
    }

    public function filtrarTalla($id){
        $Tallas = Talla::all();
        $TipoProductos = TipoProducto::all();
        $Marcas = Marca::all();

        $T = Talla::find($id);

        $Productos = $T->productos;

        return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
    }
}
