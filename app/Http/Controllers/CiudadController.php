<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Ciudad;
use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreCiudadRequest;
use genericlothing\Http\Requests\UpdateCiudadRequest;
use DB;
class CiudadController extends Controller
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
        $Ciudades = Ciudad::all();
        return view('Ciudad.index',compact('Ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ciudad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCiudadRequest $request)
    {
        $Ciudad = new Ciudad();

        $Ciudad->nom_ciudad= $request->input('nom_ciudad');
        $Ciudad->save();

        return redirect()->route('ciudad.index')->with('status','La ciudad "'.$Ciudad->nom_ciudad.'" ha sido creada exitosamente.');
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
    public function edit(Ciudad $Ciudad)
    {
      return view('ciudad.edit', compact('Ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCiudadRequest $request, Ciudad $Ciudad)
    {
      $val = DB::table('ciudad')
              ->select(DB::raw('count(*) as nom_ciudad'))
              ->where('nom_ciudad', $request->input('nom_ciudad'))->value('nom_ciudad');

      if($val == 0){
         $Ciudad->nom_ciudad = $request->input('nom_ciudad');
      }

      $Ciudad->save();

      return redirect()->route('ciudad.index', [$Ciudad])->with('status','La ciudad "'.$Ciudad->nom_ciudad.'" ha sido actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudad $Ciudad)
    {
      $delete_cli = DB::table('cliente')
              ->select(DB::raw('count(*) as estado'))
              ->where('cod_ciudad', $Ciudad->cod_ciudad)->value('estado');

      $delete_env = DB::table('envio')
              ->select(DB::raw('count(*) as estado'))
              ->where('cod_ciudad', $Ciudad->cod_ciudad)->value('estado');

      $delete_tnda = DB::table('tienda')
              ->select(DB::raw('count(*) as estado'))
              ->where('cod_ciudad', $Ciudad->cod_ciudad)->value('estado');

      if(($delete_cli == 0) && ($delete_env == 0) && ($delete_tnda == 0)){
        $Ciudad->delete();
        return redirect()->route('ciudad.index')->with('status','La ciudad "'.$Ciudad->nom_ciudad.'" ha sido eliminada exitosamente.');
      }else {
        return redirect()->route('ciudad.index')->with('status','La ciudad "'.$Ciudad->nom_ciudad.'" debe estar asociada a un cliente, envio y/o tienda, no puede ser eliminada');
      }

    }

}
