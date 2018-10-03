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
              ->addColumn('btn','actions')
              ->rawColumns(['btn'])
              ->toJson();

});
