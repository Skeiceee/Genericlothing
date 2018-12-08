@extends('Layouts.adminLayout')
@section('css')
  <link rel="stylesheet" href="/css/showStyle.css">
@endsection
@section('title', ' - Ver producto')
@section('content')
<style>
.carousel-control-prev-icon {
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik03LjcwMSwxNC4yNzZsOS41ODYtOS41ODVjMC44NzktMC44NzgsMi4zMTctMC44NzgsMy4xOTUsMGwwLjgwMSwwLjhjMC44NzgsMC44NzcsMC44NzgsMi4zMTYsMCwzLjE5NCAgTDEzLjk2OCwxNmw3LjMxNSw3LjMxNWMwLjg3OCwwLjg3OCwwLjg3OCwyLjMxNywwLDMuMTk0bC0wLjgwMSwwLjhjLTAuODc4LDAuODc5LTIuMzE2LDAuODc5LTMuMTk1LDBsLTkuNTg2LTkuNTg3ICBDNy4yMjksMTcuMjUyLDcuMDIsMTYuNjIsNy4wNTQsMTZDNy4wMiwxNS4zOCw3LjIyOSwxNC43NDgsNy43MDEsMTQuMjc2eiIgZmlsbD0iIzUxNTE1MSIvPjwvc3ZnPg==);
}
.carousel-control-next-icon {
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yNC4yOTEsMTQuMjc2TDE0LjcwNSw0LjY5Yy0wLjg3OC0wLjg3OC0yLjMxNy0wLjg3OC0zLjE5NSwwbC0wLjgsMC44Yy0wLjg3OCwwLjg3Ny0wLjg3OCwyLjMxNiwwLDMuMTk0ICBMMTguMDI0LDE2bC03LjMxNSw3LjMxNWMtMC44NzgsMC44NzgtMC44NzgsMi4zMTcsMCwzLjE5NGwwLjgsMC44YzAuODc4LDAuODc5LDIuMzE3LDAuODc5LDMuMTk1LDBsOS41ODYtOS41ODcgIGMwLjQ3Mi0wLjQ3MSwwLjY4Mi0xLjEwMywwLjY0Ny0xLjcyM0MyNC45NzMsMTUuMzgsMjQuNzYzLDE0Ljc0OCwyNC4yOTEsMTQuMjc2eiIgZmlsbD0iIzUxNTE1MSIvPjwvc3ZnPg==);
}
</style>
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_producto" class="col-lg-10 col-sm-12 col-md-10 mb-3 mx-auto">
        @include('Common.success')
        <div class="card">
            <div class="card-header">
              <span>{{$Producto->nom_producto}}</span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-4">
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
                <div class="col-lg col-sm col-md">
                  <div class="card bg-light mt-4">
                    <div class="card-header">
                      <span>Información</span>
                    </div>
                    <div class="card-body">
                      @php
                        $nomMarca = DB::table('marca')->where('cod_marca', $Producto->cod_marca)->value('nombre');
                        $nomTipoProducto = DB::table('tipo-Producto')->where('cod_tipo_producto', $Producto->cod_tipo_producto)->value('nombre');
                        if($Producto->estado == 0){
                          $str = 'Activo';
                        }else if($Producto->estado == 1){
                          $str = 'Eliminado';
                        }
                      @endphp
                      <table class="table table-bordered table-hover table-striped">
                        <tr>
                          <td>Codigo:</td>
                          <td>{{$Producto->cod_producto}}</td>
                        </tr>
                        <tr>
                          <td>Precio de venta:</td>
                          <td>{{$Producto->precio_venta}}</td>
                        </tr>
                        <tr>
                          <td>Marca:</td>
                          <td>{{$nomMarca}}</td>
                        </tr>
                        <tr>
                          <td>Tipo de producto</td>
                          <td>{{$nomTipoProducto}}</td>
                        </tr>
                        <tr>
                          <td>Estado:</td>
                          <td>{{$str}}</td>
                        </tr>
                              @php

                                $tallas = $Producto->tallas;

                                if(!$tallas->isEmpty()){
                                  echo '<tr>';
                                    echo '<td>Tallas:</td>';
                                      echo '<td>';
                                        echo '<div class="row">';
                                         foreach ($tallas as $talla) {
                                           echo '<div class="pl-3"><div class="border border-primary rounded-circle text-center" style="height: 30px; width: 30px;"><span>'.$talla->cod_talla.'</span></div></div>';
                                         }
                                     echo '</div>';
                                   echo '</td>';
                                 echo '</tr>';
                                }

                              @endphp
                      </table>
                      <div class="card">
                        <div class="card-header">
                          <span>Detalle del producto</span>
                        </div>
                        <div class="card-body">
                          <p>{{$Producto->detalle_producto}}</p>
                        </div>
                      </div>
                      <div class="card mt-3">
                        <div class="card-header">
                          <span>Ruta de las imagenes:</span>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="row">
                              <div class="col-lg-10 col-sm-12 col-md-10 mr-5">
                                <span>{{$Producto->ruta}}</span>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a class="btn btn-primary float-left" href="{{ route('producto.edit', $Producto->cod_producto) }}">Modificar</a>
              <form action="/admin/producto/{{$Producto->cod_producto}}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger float-left ml-3" type="sumbit" name="btnEliminar">Eliminar</button>
              </form>
              <a class="btn btn-primary float-right" href="{{ route('producto.index') }}">Volver</a>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
