<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('Productos',function(){
    $query = DB::table('producto as e')
           ->select('e.cod_producto', 'e.nom_producto', 'e.precio_venta', 'd.nombre as nombre_marca', 'j.nombre as nombre_tipo', DB::raw('if(e.estado = 0,\'Activo\',\'Eliminado\') as estado'))
           ->join('marca as d','e.cod_marca', '=', 'd.cod_marca')
           ->join('tipo-producto as j', 'e.cod_tipo_producto', '=', 'j.cod_tipo_producto');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsProducto')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('Tiendas',function(){

    $query = DB::table('tienda as e')
           ->select('e.cod_tienda', 'd.nom_ciudad as nombre_ciudad', 'e.nom_tienda', 'e.direccion_tienda', DB::raw('if(e.estado = 0,\'Activo\',\'Eliminado\') as estado'))
           ->join('ciudad as d','e.cod_ciudad', '=', 'd.cod_ciudad');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsTienda')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('Marcas',function(){
    $query = DB::table('marca')
           ->select('cod_marca','nombre', DB::raw('if(estado = 0,\'Activo\',\'Eliminado\') as estado'));

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsMarca')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('TipoProductos',function(){
    $query = DB::table('tipo-producto')
           ->select('cod_tipo_producto','nombre', DB::raw('if(estado = 0,\'Activo\',\'Eliminado\') as estado'));

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsTipoProducto')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('Ciudades',function(){
    $query = DB::table('ciudad')
           ->select('cod_ciudad','nom_ciudad');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsCiudad')
              ->rawColumns(['btn'])
              ->toJson();
});
