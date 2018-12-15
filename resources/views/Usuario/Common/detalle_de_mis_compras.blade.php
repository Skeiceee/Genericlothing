@extends('Layouts.index')
@section('title',' - Configuración de usuario')
@section('content')
@php
    $Total = 0;
    setlocale(LC_TIME, 'spanish');
@endphp
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mis_compras" class="col-lg-7 col-sm-12 col-md-7 mx-auto">
        @include('Common.errorProducto')
        @include('Common.success')
        @include('Common.error')

        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
            @php
              $fecha = $Venta->created_at;
              $inicio = strftime("%d de %B del %Y", strtotime($fecha));
              echo '<h1 class="float-right" style="font-size:1.20em">Compra del '.$inicio.'</h1>';
            @endphp
          </div>
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card mt-3">
              <div class="card-body">
                <span>Productos de la venta</span>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col col-lg-4">
                      Producto
                    </div>
                    <div class="col">
                      Talla
                    </div>
                    <div class="col">
                      Cantidad
                    </div>
                    <div class="col">
                      Precio
                    </div>
                    <div class="col">
                      Subtotal
                    </div>
                    <div class="col-1 col-md-1 col-sm-1 col-lg-1">
                    </div>
                  </div>
                </li>
                @php
                  $sw = 0;
                @endphp
                @foreach ($DetallesVenta as $DetalleVenta)
                  @if ($DetalleVenta->estado == 0)
                    @php
                      $NomProducto = DB::table('producto')
                          ->select('nom_producto')
                          ->where('cod_producto', '=', $DetalleVenta->cod_producto)
                          ->value('nom_producto');
                      $Total = $Total + $DetalleVenta->subtotal;
                    @endphp
                    <li class="list-group-item">
                    <div class="row">
                      <div class="col col-lg-4">
                        {{$NomProducto}}
                      </div>
                      <div class="col">
                        {{$DetalleVenta->cod_talla}}
                      </div>
                      <div class="col">
                        {{$DetalleVenta->cantidad}}
                      </div>
                      <div class="col">
                        ${{ number_format($DetalleVenta->precio_venta, 0, ',','.') }}
                      </div>
                      <div class="col">
                        ${{ number_format($DetalleVenta->subtotal, 0, ',','.') }}
                      </div>
                      <div class="col-1 col-md-1 col-sm-1 col-lg-1">
                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                      </div>
                    </div>
                  </li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>

          <div class="col-md-12 col-sm-12 col-lg-12 mt-4">
            <div class="card">
              <div class="card-body">
              <span>Productos anulados</span>
              </div>
              <ul class="list-group list-group-flush">

                @foreach ($DetallesVenta as $DetalleVenta)
                  @if ($DetalleVenta->estado == 1)
                    @php
                      $NomProducto = DB::table('producto')
                          ->select('nom_producto')
                          ->where('cod_producto', '=', $DetalleVenta->cod_producto)
                          ->value('nom_producto');
                      $Total = $Total + $DetalleVenta->subtotal;
                    @endphp
                    <li class="list-group-item">
                    <div class="row">
                      <div class="col col-lg-4">
                        {{$NomProducto}}
                      </div>
                      <div class="col">
                        {{$DetalleVenta->cod_talla}}
                      </div>
                      <div class="col">
                        {{$DetalleVenta->cantidad}}
                      </div>
                      <div class="col">
                        ${{ number_format($DetalleVenta->precio_venta, 0, ',','.') }}
                      </div>
                      <div class="col">
                        ${{ number_format($DetalleVenta->subtotal, 0, ',','.') }}
                      </div>
                      <div class="col-1 col-md-1 col-sm-1 col-lg-1">

                      </div>
                    </div>
                  </li>
                  @endif
                @endforeach

              </ul>
            </div>
          </div>

          <div class="col-12 mt-4 text-center">
            <a class="btn btn-info btn-block" href="{{route('misCompras')}}">Volver a comprar</a>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
