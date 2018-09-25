<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Marca;
use genericlothing\TipoProducto;
use genericlothing\Producto;
use Illuminate\Http\Request;
class ProductoController extends Controller
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
        $Productos = Producto::all();
        return view('Producto.index',compact('Productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TipoProductos = TipoProducto::all();
        $Marcas = Marca::all();
        return view('Producto.create',compact('TipoProductos','Marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$validateData = $request->validate([
        //'nombre' => 'required|string|max: 30',
        //'precio_venta' =>'required|numeric',
        //'tipo_de_producto' => 'required',
        //'marca' => 'required',
        //'foto_producto' =>  'required|image'
      //]);

      if($request->hasFile('foto_producto')){
        $file = $request->file('foto_producto');
        $name = time().$file->getClientOriginalName();
        $ruta = public_path('img').'\\'.$request->input('nombre').'\\';
        $file->move(public_path('img').'\\'.$request->input('nombre').'\\', $name);
      }
        $Producto = new Producto();

        $Producto->cod_tipo_producto = $request->input('tipo_de_producto');
        $Producto->cod_marca = $request->input('marca');
        $Producto->nom_producto = $request->input('nombre');
        $Producto->precio_venta = $request->input('precio_venta');
        $Producto->estado = 0;
        $Producto->ruta = $ruta;
        $Producto->save();

        return 'Guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Producto = Producto::find($id);
        return view('Producto.show', compact('Producto'));
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
