<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;
use genericlothing\Ciudad;
use genericlothing\TipoProducto;
use genericlothing\Producto;
use genericlothing\Marca;
use genericlothing\Talla;
use genericlothing\Http\Requests\ConfiguracionUserRequest;
use DB;


class HomeController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();

      $Productos =  new Producto;
      $Productos = $Productos->allProductos();

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
                     ['precio_venta', '>=', DB::raw((int)$minPrice)],
                     ['estado','=', DB::raw((int)0)]
                     ])->get();

      }else if( $Request->cod_marca == -1 && $Request->cod_de_tipo != -1) {
        $Productos = DB::table('producto')
                     ->whereColumn([
                     ['cod_tipo_producto', '=',  DB::raw((int)$Request->cod_de_tipo)],
                     ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                     ['precio_venta', '>=', DB::raw((int)$minPrice)],
                     ['estado','=', DB::raw((int)0)]
                     ])->get();
      }else if( ($Request->cod_de_tipo == -1) && ($Request->cod_marca == -1) ) {
        $Productos = DB::table('producto')
                     ->whereColumn([
                     ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                     ['precio_venta', '>=', DB::raw((int)$minPrice)],
                     ['estado','=', DB::raw((int)0)]
                     ])->get();
      }else{
        $Productos = DB::table('producto')
                     ->whereColumn([
                     ['cod_tipo_producto', '=',  DB::raw((int)$Request->cod_de_tipo)],
                     ['cod_marca', '=',  DB::raw('\''.$Request->cod_marca.'\'')],
                     ['precio_venta', '<=', DB::raw((int)$maxPrice)],
                     ['precio_venta', '>=', DB::raw((int)$minPrice)],
                     ['estado','=', DB::raw((int)0)]
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
                     ['cod_tipo_producto', '=',  DB::raw((int)$TP->cod_tipo_producto)],
                     ['estado','=', DB::raw((int)0)]
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
                     ['cod_marca', '=',  DB::raw((int)$M->cod_marca)],
                     ['estado','=', DB::raw((int)0)]
                     ])->get();

        return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
    }

    public function filtrarTalla($id){
        $Tallas = Talla::all();
        $TipoProductos = TipoProducto::all();
        $Marcas = Marca::all();

        $T = Talla::find($id);

        $Productos = $T->productos;
        $Productos = $Productos->filter(function ($value, $key) {
            return $value->estado == 0;
        });

        return view('Home.index',compact('TipoProductos','Productos','Marcas','Tallas'));
    }

    public function configurarUser(ConfiguracionUserRequest $request){
      $rut_cliente = auth()->user()->rut_cliente;
      DB::table('cliente')
          ->where('rut_cliente', '=',  DB::raw('\''.$rut_cliente.'\''))
          ->update(
            [
            'nom_cliente' => $request->nom_cliente,
            'apellido_paterno' =>  $request->apellido_paterno,
            'apellido_materno' =>  $request->apellido_materno,
            'telefono' =>  $request->telefono,
            'cod_ciudad' =>  $request->ciudad
            ]
          );

      return redirect()->route('configuracion')->with('status','Se ha configurado correctamente su cuenta.');
    }

    public function misCompras(){
      $rut = auth()->user()->rut_cliente;

      $Ventas = DB::table('venta')->select('*')
            ->where('rut_cliente', '=', DB::raw('\''.$rut.'\''))->get();

      $Tallas = Talla::all();
      $TipoProductos = TipoProducto::all();
      $Marcas = Marca::all();

      return view('Usuario.Common.mis_compras',compact('TipoProductos','Marcas','Tallas','Ventas'));
    }

}
