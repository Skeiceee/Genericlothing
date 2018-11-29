<?php

namespace genericlothing\Http\Controllers;

use genericlothing\Ciudad;
use genericlothing\Tienda;
use Illuminate\Http\Request;
use genericlothing\Http\Requests\StoreTiendaRequest;
use genericlothing\Http\Requests\UpdateTiendaRequest;
use DB;
class TiendaController extends Controller
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
        $Tiendas = Tienda::all();
        return view('Tienda.index',compact('Tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Ciudades = Ciudad::all();
        return view('Tienda.create',compact('Ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTiendaRequest $request)
    {
        $Tienda = new Tienda();

        $Tienda->cod_ciudad = $request->input('ciudad');
        $Tienda->nom_tienda = $request->input('nom_tienda');
        $Tienda->direccion_tienda = $request->input('direccion_tienda');
        $Tienda->estado = 0;
        $Tienda->save();

        return redirect()->route('tienda.index')->with('status','La tienda "'.$Tienda->nom_tienda.'" ha sido creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $Tienda = Tienda::find($id);
      $Bodegas = Tienda::find($id)->bodegas;

      return view('tienda.show', compact('Tienda','Bodegas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tienda $Tienda)
    {
      $Ciudades = Ciudad::all();
      return view('Tienda.edit', compact('Tienda','Ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTiendaRequest $request, Tienda $Tienda)
    {
      $val = DB::table('tienda')
              ->select(DB::raw('count(*) as cant'))
              ->where('direccion_tienda', $request->input('direccion_tienda'))->value('cant');

      if($val == 0){
        $Tienda->direccion_tienda = $request->input('direccion_tienda');
      }

      $Tienda->save();

      if($val == 0){
        return redirect()->route('tienda.index', [$Tienda])->with('status','La tienda "'.$Tienda->nom_tienda.'" ha sido actualizada exitosamente.');
      }else{
        return redirect()->route('tienda.index', [$Tienda])->with('status','A la tienda "'.$Tienda->nom_tienda.'" se le ingreso una direccion repetida, no ha sido modificado tal campo.');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tienda $Tienda)
    {

        $delete_bdg = DB::table('Bodega')
                ->select(DB::raw('count(*) as cant'))
                ->where('cod_tienda', $Tienda->cod_tienda)->value('cant');

        if($delete_bdg == 0){
          $Tienda->delete();
          return redirect()->route('tienda.index')->with('status','La tienda "'.$Tienda->nom_tienda.'" ha sido eliminada exitosamente.');
        }else{
          return redirect()->route('tienda.index')->with('status','La tienda "'.$Tienda->nom_tienda.'" esta asociada a una bodega, no puede ser eliminada.');
        }

    }

}
