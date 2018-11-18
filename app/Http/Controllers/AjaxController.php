<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;
use genericlothing\Tienda;
use DB;
class AjaxController extends Controller
{
      public function ajaxBodegasFind(Request $Request)
      {
        $str = "";
        $Tienda = new Tienda;
        $Bodegas = $Tienda->find($Request->ctienda)->bodegas;

        foreach($Bodegas as $Bodega){

          if($Bodega->estado == 0){
              $str = $str.'<option value="'.$Bodega->cod_bodega.'">'.$Bodega->direccion_bodega.'</option>';
          }
        }

        return $str;
      }
}
