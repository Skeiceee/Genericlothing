<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Marca;
use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreMarcaRequest;
use genericlothing\Http\Requests\UpdateMarcaRequest;
use DB;
class MarcaController extends Controller
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
        $Marcas = Marca::all();
        return view('Marca.index',compact('Marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarcaRequest $request)
    {
        $Marca = new Marca();

        $Marca->nombre = $request->input('nombre');
        $Marca->estado = 0;
        $Marca->save();
        return redirect()->route('marca.index')->with('status','La marca "'.$Marca->nombre.'" ha sido creada exitosamente.');
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
    public function edit(Marca $Marca)
    {
      return view('Marca.edit', compact('Marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarcaRequest $request, Marca $Marca)
    {
      $val = DB::table('marca')
              ->select(DB::raw('count(*) as nombre'))
              ->where('nombre', $request->input('nombre'))->value('nombre');

      $estado = $request->input('estado');

      if($val == 0){
        $Marca->nombre = $request->input('nombre');
      }

      if($estado != null){
        $Marca->estado = $estado;
      }

      $Marca->save();

      return redirect()->route('marca.index', [$Marca])->with('status','La marca "'.$Marca->nombre.'" ha sido actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $Marca)
    {
      $delete = DB::table('producto')
              ->select(DB::raw('count(*) as estado'))
              ->where('cod_marca', $Marca->cod_marca)->value('estado');

      if($delete == 0){
        $Marca->estado = 1;
        $Marca->save();
        return redirect()->route('marca.index')->with('status','La marca "'.$Marca->nombre.'" ha sido eliminado exitosamente.');
      }else if($delete == 1){
        return redirect()->route('marca.index')->with('status_error','La marca "'.$Marca->nombre.'" esta asociada a un producto, no puede ser eliminada');
      }else{
        return redirect()->route('marca.index')->with('status_error','La marca "'.$Marca->nombre.'" esta asociada a '.$delete.' productos, no puede ser eliminada');
      }
    }
}
