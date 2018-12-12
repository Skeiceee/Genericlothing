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
           ->select('e.cod_producto', 'e.nom_producto', 'e.precio_venta', 'd.nombre as nombre_marca', 'j.nombre as nombre_tipo', DB::raw('if(e.estado = 0,\'Activo\',if(e.estado = 1,\'Eliminado\',\'Descontinuado\')) as estado'))
           ->join('marca as d','e.cod_marca', '=', 'd.cod_marca')
           ->join('tipo-producto as j', 'e.cod_tipo_producto', '=', 'j.cod_tipo_producto');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsProducto')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('ExistenciaProductos',function(){
    $query = DB::table('existencia-producto as e')
           ->select('e.cod_producto', 'e.cod_talla', 'e.cod_bodega', 'd.nom_tienda as nombre_tienda', 'e.proveedor', 'e.precio_compra','e.cantidad', 'e.created_at', 'e.updated_at')
           ->join('tienda as d','e.cod_tienda', '=', 'd.cod_tienda');

    return datatables()
              ->of($query)
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


Route::get('Tallas',function(){

    $query = DB::table('talla as e')
           ->select('e.cod_talla','e.descripcion', DB::raw('if(e.estado = 0,\'Activo\',\'Eliminado\') as estado'));


    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsTalla')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('Bodegas',function(){

    $query = DB::table('bodega as e')
           ->select('e.cod_bodega', 'd.nom_tienda as nombre_tienda', 'e.direccion_bodega', 'e.estado', DB::raw('if(e.estado = 0,\'Activo\',\'Eliminado\') as estado'))
           ->join('tienda as d','e.cod_tienda', '=', 'd.cod_tienda');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsBodega')
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

Route::get('Clientes',function(){

    $query = DB::table('cliente as e')
           ->select('e.rut_cliente', 'e.nom_cliente', 'e.apellido_paterno', 'e.apellido_materno', 'e.telefono', 'd.nom_ciudad as nombre_ciudad', 'e.email', DB::raw('if(e.estado = 0,\'Activo\',if(e.estado = 1,\'Eliminado\',\'Administrador\')) as estado'))
           ->join('ciudad as d','e.cod_ciudad', '=', 'd.cod_ciudad');

    return datatables()
              ->of($query)
              ->toJson();
});

Route::get('Pedidos',function(){

    $query = DB::table('pedido as e')
           ->select('e.cod_pedido', 'd.rut_cliente as rut_cliente', 'e.fecha', 'e.total', 'e.estado', DB::raw('if(e.estado = 0,\'Activo\',\'Anulado\') as estado'))
           ->join('cliente as d','e.rut_cliente', '=', 'd.rut_cliente');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsPedido')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('Ventas',function(){

    $query = DB::table('venta as e')
           ->select('e.cod_venta', 'd.rut_cliente as rut_cliente', 'e.fecha', 'e.total', 'e.tipo', 'e.estado', 'e.envio', DB::raw('if(e.tipo = 0,\'Boleta\',\'Factura\') as tipo, if(e.estado = 0,\'Activo\',\'Anulada\') as estado, if(e.envio = 0,\'Si\',\'No\') as envio'))
           ->join('cliente as d','e.rut_cliente', '=', 'd.rut_cliente');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsVenta')
              ->rawColumns(['btn'])
              ->toJson();
});

Route::get('Envios',function(){

    $query = DB::table('envio as e')
           ->select('e.cod_venta', 'd.nom_ciudad as nombre_ciudad', 'e.telefono', 'e.precio_envio', 'e.estado', DB::raw('if(e.estado = 0,\'Pendiente\',\'Enviado\') as estado'))
           ->join('ciudad as d','e.cod_ciudad', '=', 'd.cod_ciudad');

    return datatables()
              ->of($query)
              ->addColumn('btn','Actions.actionsEnvio')
              ->rawColumns(['btn'])
              ->toJson();
});
