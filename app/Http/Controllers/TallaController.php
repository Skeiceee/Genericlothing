<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Talla;
use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreTallaRequest;
use genericlothing\Http\Requests\UpdateTallaRequest;
use DB;
class TallaController extends Controller
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
        $Tallas = Talla::all();
        return view('Talla.index',compact('Tallas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Talla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTallaRequest $request)
    {
        $Talla = new Talla();

        $Talla->cod_talla = strtoupper($request->input('cod_talla'));
        $Talla->descripcion = $request->input('descripcion');
        $Talla->estado = 0;
        $Talla->save();

        return redirect()->route('talla.index')->with('status','La talla "'.$Talla->cod_talla.'" ha sido creada exitosamente.');
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
    public function edit(Talla $Talla)
    {
      return view('Talla.edit', compact('Talla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTallaRequest $request, Talla $Talla)
    {
      $val = DB::table('talla')
              ->select(DB::raw('count(*) as cant'))
              ->where('cod_talla', $request->input('cod_talla'))->value('cant');

      $estado = $request->input('estado');

      if($val == 0){
         $Talla->cod_talla = $request->input('cod_talla');
      }

      if($estado != null){
        $Talla->estado = $estado;
      }

      $Talla->descripcion = $request->input('descripcion');

      $Talla->save();

      return redirect()->route('talla.index', [$Talla])->with('status','La talla "'.$Talla->cod_talla.'" ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talla $Talla)
    {
      $delete_exi = DB::table('existencia-producto')
              ->select(DB::raw('count(*) as cant'))
              ->where('cod_talla', $Talla->cod_talla)->value('cant');

      if($delete_exi == 0){

        $Talla->estado = 1;
        $Talla->save();
        return redirect()->route('talla.index')->with('status','La talla"'.$Talla->cod_talla.'" ha sido eliminada exitosamente.');

      }else if($delete_exi == 1){

        return redirect()->route('talla.index')->with('status_error','La talla "'.$Talla->cod_talla.'" esta asociada a un existencia de un producto');

      }else{

        return redirect()->route('talla.index')->with('status_error','La talla "'.$Talla->cod_talla.'" esta asociada a existencias de productos');
        
      }

    }
}
