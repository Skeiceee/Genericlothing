<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Tienda;
use genericlothing\Bodega;
use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreBodegaRequest;
use DB;
class BodegaController extends Controller
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
        $Bodegas = Bodega::all();
        return view('Bodega.index',compact('Bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tiendas = Tienda::all();
        return view('Bodega.create', compact('Tiendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBodegaRequest $request)
    {
        $Bodega = new Bodega();

        $Bodega->cod_tienda = $request->input('tienda');
        $Bodega->direccion_bodega = $request->input('direccion_bodega');
        $Bodega->estado = 0;
        $Bodega->save();

        return redirect()->route('bodega.index')->with('status','La bodega ha sido creada exitosamente.');

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
    public function edit(Bodega $Bodega)
    {

      $Tiendas = Tienda::all();
      return view('Bodega.edit', compact('Bodega','Tiendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $Bodega)
    {
      $val = DB::table('bodega')
              ->select(DB::raw('count(*) as cant'))
              ->where('direccion_bodega', $request->input('direccion_bodega'))->value('cant');

      if($val == 0){
        $Bodega->direccion_bodega = $request->input('direccion_bodega');
      }

      $Bodega->save();
      return redirect()->route('bodega.index')->with('status','La bodega '.$Bodega->cod_bodega.' ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bodega $Bodega)
    {
      $delete_exi = DB::table('existencia-producto')
              ->select(DB::raw('count(*) as cant'))
              ->where('cod_bodega', $Bodega->cod_bodega)->value('cant');

      if($delete_exi == 0){
        $Bodega->delete();
        return redirect()->route('bodega.index')->with('status','La bodega ha sido eliminada exitosamente.');
      }else{
        return redirect()->route('bodega.index')->with('status_error','La bodega esta asociada a una existencia de producto, no puede ser eliminada.');
      }

    }
}
