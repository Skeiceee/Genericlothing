  @extends('Layouts.index')
  @section('title')
  @section('css')
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{asset('css/ion.rangeSlider.skinFlat.css')}}" />
  @endsection
  @section('content')
  <section class="container-fluid mt-4 pl-4">
    <div class="row mx-auto pl-4">
      <div class="col-lg-3 col-sm-12 col-md-3">
        @include('Common.error')
        <form class="form-group" action="/home/filtro" method="get">
          @csrf
        <div class="card">
          <div class="card-header">
            <span>Filtro</span>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="cod_de_tipo">Tipo de producto</label>
              <select class="form-control" name="cod_de_tipo">
                <option value="{{-1}}">Todos los tipos</option>
                @foreach ($TipoProductos as $TipoProducto)
                  @if ($TipoProducto->estado == 0)
                  <option value="{{$TipoProducto->cod_tipo_producto}}">{{$TipoProducto->nombre}}</option>
                  @endif
                @endforeach
              </select>
              <label for="cod_marca">Marca</label>
              <select class="form-control" name="cod_marca">
                <option value="{{-1}}">Todas las marcas</option>
                @foreach ($Marcas as $Marca)
                  @if ($Marca->estado == 0)
                  <option value="{{$Marca->cod_marca}}">{{$Marca->nombre}}</option>
                  @endif
                @endforeach
              </select>
              <label for="cod_talla">Talla</label>
              <select class="form-control" name="cod_talla">
                <option value="{{-1}}">Todas las tallas</option>
                @foreach ($Tallas as $Talla)
                  @if ($Talla->estado == 0)
                  <option value="{{$Talla->cod_talla}}">{{$Talla->cod_talla}}</option>
                  @endif
                @endforeach
              </select>
              <div class="form-grup mt-2">
                <label for="precio">Precio</label>
                    <input type="text" id="range" value="" name="range" />
              </div>
            </div>
            <button class="btn btn-info btn-block" type="sumbit" name="button">Filtrar</button>
          </div>
        </div>
        </form>
      </div>
      <div class="col-lg-9 col-sm col-md-9 pl-4">
        <div class="row">
            @foreach ($Productos as $Producto)
              <div class="mr-4 mb-4" style="width: 18rem;">
                @php
                  $sw = 0;
                  // Abrir el directorio
                  $dir_handle = opendir($Producto->ruta);
                  // Lee contenidos de la ruta
                  while((($file_name = readdir($dir_handle)) !== false) && ($sw !=  1)){

                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

                    if( $ext === 'png' || $ext === 'jpg' ) {
                      echo('<a href="show/'.$Producto->cod_producto.'"'.$Producto->nom_producto.'"><img class="d-block w-100" src="/img/'.$Producto->nom_producto.'/'.$file_name.'"></a>');
                      $sw = 1;
                    }

                  }
                  // Cierra el ditectorio
                  closedir($dir_handle);
                @endphp
                <div class="card-body text-dark text-center">
                  <div class="row">
                    <div class="col-lg col-sm col-md text-center">
                        <h6>{{$Producto->nom_producto}}</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg col-sm col-md text-center">
                      @php
                      (int)$precio = $Producto->precio_venta;

                      echo '<span class="pt-3">$'.number_format($precio, 0, ',','.').'</span>';
                      @endphp
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </section>
  @endsection
  @section('script')
    <script src="{{asset('js/ion.rangeSlider.js')}}"></script>
    <script>
        $(function () {
            $("#range").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 1,
                max: 79288,
                from: 0,
                to: 79288,
                type: 'double',
                step: 1,
                prefix: "$",
                grid: true
            });

        });
    </script>
  @endsection
