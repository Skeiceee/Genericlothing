@extends('Layouts.adminLayout')
@section('css')
  <link rel="stylesheet" href="/css/showStyle.css">
@endsection
@section('title', ' - Productos')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_producto" class="col-lg col-sm col-md mt-4">
        <div class="card">
            <div class="card-header">
              <span>{{$Producto->nom_producto}}</span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-4">
                  @php
                      // Abrir el directorio
                      $dir_handle = opendir($Producto->ruta);
                      // Lee contenidos de la ruta
                      while(($file_name = readdir($dir_handle)) !== false)
                      {
                        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                        if( $ext === 'png' || $ext === 'jpg' ) {
                          echo('<img class="img-fluid" src="/img/'.$Producto->nom_producto.'/'.$file_name.'">');
                        }
                      }
                      // Cierra el ditectorio
                      closedir($dir_handle);
                  @endphp
                </div>
                <div class="col-lg col-sm col-md">
                  <div class="card bg-light mt-4">
                    <div class="card-header">
                      <span>Información</span>
                    </div>
                    <div class="card-body">
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
                          <td>Codigo de marca:</td>
                          <td>{{$Producto->cod_marca}}</td>
                        </tr>
                        <tr>
                          <td>Codigo de tipo de marca:</td>
                          <td>{{$Producto->cod_tipo_producto}}</td>
                        </tr>
                        <tr>
                          <td>Estado:</td>
                          <td>{{$Producto->estado}}</td>
                        </tr>
                      </table>
                      <div class="card">
                        <div class="card-header">
                          <span>Rutas de imagenes:</span>
                        </div>
                        <div class="card-body container-fluid">
                          @php
                              echo '<hr>';
                              // Abrir el directorio
                              $dir_handle = opendir($Producto->ruta);
                              // Lee contenidos de la ruta
                              while(($file_name = readdir($dir_handle)) !== false)
                              {
                                $ext = pathinfo($file_name, PATHINFO_EXTENSION);

                                if( $ext === 'png' || $ext === 'jpg' ) {

                                  echo('
                                  <div class="row">
                                    <div class="col-lg-10 col-sm-12 col-md-10 mr-5">
                                      <span>'.$Producto->ruta.$file_name.'</span>
                                    </div>
                                    <div class="col-lg col-sm col-md mt-1">
                                        <button class="btn btn-primary">Copiar</button>
                                    </div>
                                  </div>
                                  <hr>');

                                }
                              }
                              // Cierra el ditectorio
                              closedir($dir_handle);
                          @endphp
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
