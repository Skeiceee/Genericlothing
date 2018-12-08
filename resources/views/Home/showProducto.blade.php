@extends('Layouts.index')
@section('title')
@section('content')
<style>
  .carousel-control-prev-icon {
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik03LjcwMSwxNC4yNzZsOS41ODYtOS41ODVjMC44NzktMC44NzgsMi4zMTctMC44NzgsMy4xOTUsMGwwLjgwMSwwLjhjMC44NzgsMC44NzcsMC44NzgsMi4zMTYsMCwzLjE5NCAgTDEzLjk2OCwxNmw3LjMxNSw3LjMxNWMwLjg3OCwwLjg3OCwwLjg3OCwyLjMxNywwLDMuMTk0bC0wLjgwMSwwLjhjLTAuODc4LDAuODc5LTIuMzE2LDAuODc5LTMuMTk1LDBsLTkuNTg2LTkuNTg3ICBDNy4yMjksMTcuMjUyLDcuMDIsMTYuNjIsNy4wNTQsMTZDNy4wMiwxNS4zOCw3LjIyOSwxNC43NDgsNy43MDEsMTQuMjc2eiIgZmlsbD0iIzUxNTE1MSIvPjwvc3ZnPg==);
}
  .carousel-control-next-icon {
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yNC4yOTEsMTQuMjc2TDE0LjcwNSw0LjY5Yy0wLjg3OC0wLjg3OC0yLjMxNy0wLjg3OC0zLjE5NSwwbC0wLjgsMC44Yy0wLjg3OCwwLjg3Ny0wLjg3OCwyLjMxNiwwLDMuMTk0ICBMMTguMDI0LDE2bC03LjMxNSw3LjMxNWMtMC44NzgsMC44NzgtMC44NzgsMi4zMTcsMCwzLjE5NGwwLjgsMC44YzAuODc4LDAuODc5LDIuMzE3LDAuODc5LDMuMTk1LDBsOS41ODYtOS41ODcgIGMwLjQ3Mi0wLjQ3MSwwLjY4Mi0xLjEwMywwLjY0Ny0xLjcyM0MyNC45NzMsMTUuMzgsMjQuNzYzLDE0Ljc0OCwyNC4yOTEsMTQuMjc2eiIgZmlsbD0iIzUxNTE1MSIvPjwvc3ZnPg==);
}
</style>
<section class="container-fluid pt-4 mx-auto">
  <div class="row">
    <div class="col-lg-8 col-sm-12 col-md-8 mx-auto">
      <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6">
          <h4>{{$Producto->nom_producto}}</h4>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
          @php
            $sw = 0;
            // Abrir el directorio
            $dir_handle = opendir($Producto->ruta);
            // Lee contenidos de la ruta
            while(($file_name = readdir($dir_handle)) !== false){
              $ext = pathinfo($file_name, PATHINFO_EXTENSION);

              if( $ext === 'png' || $ext === 'jpg' ) {
                if($sw == 0){
                  echo('<div class="carousel-item active">');
                  $sw = 1;
                }else{
                  echo('<div class="carousel-item">');
                }
                echo('<img class="d-block w-100" src="/img/'.$Producto->nom_producto.'/'.$file_name.'">');
                echo('</div>');
              }

            }
            // Cierra el ditectorio
            closedir($dir_handle);
          @endphp
            </div>
            <a class="carousel-control-prev"  href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next"   href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-lg col-sm col-md mt-4">
        <form class="form-group" action="#" method="get">
          <div class="card mt-2">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                @php
                (int)$precio = $Producto->precio_venta;
                echo '<li class="list-group-item">Precio: $'.number_format($precio, 0, ',', '.').'</li>';
                @endphp

                <li class="list-group-item">
                  @php
                    $stock = 0;
                    $cantidades = $Producto->existencias()
                                    ->orderBy('pivot_cod_talla', 'asc')
                                    ->get();;
                    foreach($cantidades as $cantidad){
                      $stock = $stock + $cantidad->getOriginal('pivot_cantidad');
                    }

                    echo 'Stock total: ';

                    if($stock != 0){
                      echo $stock;
                    }else {
                      echo 'Agotado';
                    }

                  @endphp

                </li>
                @php
                  $nomMarca = DB::table('marca')->where('cod_marca', $Producto->cod_marca)->value('nombre');
                  $nomTipoProducto = DB::table('tipo-Producto')->where('cod_tipo_producto', $Producto->cod_tipo_producto)->value('nombre');
                @endphp
                <li class="list-group-item">Marca: {{$nomMarca}}</li>
                <li class="list-group-item">Tipo de producto: {{$nomTipoProducto}}</li>
                <li class="list-group-item">Descripcion: {{$Producto->detalle_producto}}</li>

                <li class="list-group-item text-center">
                  @php
                    $i = 1;
                    if ($cantidades->isEmpty()) {
                      echo '<h4><span class="badge badge badge-danger font-weight-bold mt-4"> Sin reservas </span></h4>';
                    }else {
                      foreach($cantidades as $cantidad){
                        echo '<div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="'.$cantidad->getOriginal('pivot_cod_talla').'_'.$i.'" value="option1">
                          <label class="form-check-label" for="'.$cantidad->getOriginal('pivot_cod_talla').'_'.$i.'">'.$cantidad->getOriginal('pivot_cod_talla').'</label>
                        </div>';
                        if((int)$cantidad->getOriginal('pivot_cantidad') > 5){
                          echo '<span class="badge badge-info mr-2">'.$cantidad->getOriginal('pivot_cantidad').'</span>';
                        }else if((int)$cantidad->getOriginal('pivot_cantidad') <= 5 && (int)$cantidad->getOriginal('pivot_cantidad') >= 1){
                          echo '<span class="badge badge badge-danger mr-2">'.$cantidad->getOriginal('pivot_cantidad').'</span>';
                        }
                        $stock = $stock + $cantidad->getOriginal('pivot_cantidad');
                        $i++;
                      }
                    }
                  @endphp
                </li>
                <button class="btn btn-info btn-block" type="sumbit" name="button">Agregar al carro</button>
              </ul>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
