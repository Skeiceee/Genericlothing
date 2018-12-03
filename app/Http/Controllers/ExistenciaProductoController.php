<?php

namespace genericlothing\Http\Controllers;
use genericlothing\Producto;
use genericlothing\Talla;
use genericlothing\Tienda;
use genericlothing\Bodega;
use genericlothing\ExistenciaProducto;
use genericlothing\Http\Requests\StoreExistenciaProductoRequest;
use Illuminate\Http\Request;
use DB;
class ExistenciaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
          $this->middleware('auth');
          $this->middleware('permisos');
     }
    public function index()
    {
        return view('Existencia-Producto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Producto = NULL;
        $Tallas = Talla::all();
        $Bodegas = Bodega::all();
        $Productos = Producto::all();
        $Tiendas = Tienda::all();
        return view('Existencia-Producto.create',compact('Tiendas','Tallas','Bodegas','Productos','Producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExistenciaProductoRequest $request)
    {
      $EP =  ExistenciaProducto::whereColumn([
                   ['cod_producto', '=',  DB::raw((int)$request->cod_producto)],
                   ['cod_talla', '=',  DB::raw('\''.$request->cod_talla.'\'')],
                   ['cod_bodega', '=', DB::raw((int)$request->direccion_bodega)],
                   ['cod_tienda', '=', DB::raw((int)$request->cod_tienda)]
                   ])->first();

     if($EP != null){

       if($EP->precio_compra == $request->precio_compra &&
         $EP->proveedor == $request->proveedor){

         $EP->cantidad = $EP->cantidad + $request->cantidad;
         $EP->updated_at = date('Y-m-d G:i:s');

         $EP->updateEp($EP);

         return redirect()->route('existencia-producto.index')->with('status','La existencia del producto a sido creada exitosamente.');
       }

     }else{

        $EP = new ExistenciaProducto();

        $EP->cod_producto = $request->cod_producto;
        $EP->cod_talla = $request->cod_talla;
        $EP->cod_bodega = $request->direccion_bodega;
        $EP->cod_tienda = $request->cod_tienda;

        $EP->proveedor = $request->proveedor;
        $EP->precio_compra = $request->precio_compra;
        $EP->cantidad = $request->cantidad;

        $EP->created_at = date('Y-m-d G:i:s');
        $EP->updated_at = date('Y-m-d G:i:s');

        $EP->saveEp($EP);

        return redirect()->route('existencia-producto.index')->with('status','La existencia del producto a sido creada exitosamente.');
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
