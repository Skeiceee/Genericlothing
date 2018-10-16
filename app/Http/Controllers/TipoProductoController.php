<?php

namespace genericlothing\Http\Controllers;

use genericlothing\TipoProducto;
use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreTipoProductoRequest;
use genericlothing\Http\Requests\UpdateTipoProductoRequest;
use DB;
class TipoProductoController extends Controller
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
      $TipoProductos = TipoProducto::all();
      return view('Tipo-Producto.index',compact('TipoProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipo-Producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoProductoRequest  $request)
    {
        $TipoProducto = new TipoProducto();

        $TipoProducto->nombre = $request->input('nombre');
        $TipoProducto->estado = 0;
        $TipoProducto->save();

        return redirect()->route('tipo-producto.index')->with('status','El tipo de producto "'.$TipoProducto->nombre.'" a sido creado exitosamente.');
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
    public function edit(TipoProducto $TipoProducto)
    {
      return view('Tipo-Producto.edit', compact('TipoProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoProductoRequest $request, TipoProducto $TipoProducto)
    {
      $val = DB::table('tipo-producto')
              ->select(DB::raw('count(*) as nombre'))
              ->where('nombre', $request->input('nombre'))->value('nombre');

      $estado = $request->input('estado');

      if($val == 0){
        $TipoProducto->nombre = $request->input('nombre');
      }else{

      }
      if($estado != null){
        $TipoProducto->estado = $estado;
      }

      $TipoProducto->save();

      return redirect()->route('tipo-producto.index', [$TipoProducto])->with('status','La marca "'.$TipoProducto->nombre.'" a sido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProducto $TipoProducto)
    {
      $delete = DB::table('producto')
              ->select(DB::raw('count(*) as estado'))
              ->where('cod_tipo_producto', $TipoProducto->cod_tipo_producto)->value('estado');

      if($delete == 0){
        $TipoProducto->estado = 1;
        $TipoProducto->save();
        return redirect()->route('tipo-producto.index')->with('status','El tipo de producto "'.$TipoProducto->nombre.'" a sido eliminado exitosamente.');
      }else if($delete == 1){
        return redirect()->route('tipo-producto.index')->with('status','El tipo de producto "'.$TipoProducto->nombre.'" esta asociado a un producto, no puede ser eliminada');
      }else{
        return redirect()->route('tipo-producto.index')->with('status','El tipo de producto "'.$TipoProducto->nombre.'" esta asociado a '.$delete.' productos, no puede ser eliminada');
      }
    }
}
