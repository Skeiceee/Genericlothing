<?php

namespace genericlothing\Http\Controllers;
use genericlothing\Producto;
use genericlothing\Talla;
use genericlothing\Tienda;
use genericlothing\Bodega;
use genericlothing\ExistenciaProducto;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        return $request;
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
