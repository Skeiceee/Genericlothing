@extends('Layouts.index')
@section('title',' - Configuración de usuario')
@section('content')
@php
  setlocale(LC_TIME, 'spanish');
@endphp
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mis_compras" class="col-lg-6 col-sm-12 col-md-6 mx-auto">
        @include('Common.errorProducto')
        @include('Common.success')
        @include('Common.error')

        <div class="row">

          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
              <div class="card-body">
                <span>Ventas en curso</span>
              </div>
              <ul class="list-group list-group-flush">
                @php
                  $sw = 0;
                @endphp
                @foreach ($Ventas as $venta)
                  @if ($venta->estado == 0)
                    <li class="list-group-item">
                        @php
                          $fecha = $venta->created_at;
                          $inicio = strftime("%d de %B del %Y", strtotime($fecha));
                          echo '<span>Compra del '.$inicio.'</span>';
                        @endphp
                      <a class="btn btn-danger float-right mr-2" href="#">Anular</a>
                      <a class="btn btn-info float-right mr-2" href="#">Ver detalles</a>
                      <span class="float-right mr-4">Total: {{$venta->total}}</span>
                    </li>
                  @else
                    @if ($sw == 0)
                      <li class="list-group-item text-center">
                        <span class="text-black-50">No tiene ventas en curso</span>
                      </li>
                      @php
                        $sw = 1;
                      @endphp
                    @endif
                  @endif
                @endforeach
              </ul>
            </div>
          </div>


          <div class="col-md-12 col-sm-12 col-lg-12 mt-4">
            <div class="card">
              <div class="card-body">
              <span>Ventas concretadas</span>
              </div>
              <ul class="list-group list-group-flush">
                @php
                  $sw = 0;
                @endphp
                @foreach ($Ventas as $venta)
                  @if ($venta->estado == 1)
                    <li class="list-group-item">
                      @php
                        $fecha = $venta->created_at;
                        $inicio = strftime("%d de %B del %Y", strtotime($fecha));
                        echo '<span>Compra del '.$inicio.'</span>';
                      @endphp
                      <a class="btn btn-info float-right mr-2" href="#">Ver detalles</a>
                      <span class="float-right mr-4"> Total: {{$venta->total}}</span>
                    </li>
                  @else
                    @if ($sw == 0)
                      <li class="list-group-item text-center">
                        <span class="text-black-50">No tiene ventas concretadas</span>
                      </li>
                      @php
                        $sw = 1;
                      @endphp
                    @endif
                  @endif
                @endforeach
              </ul>
            </div>
          </div>


          <div class="col-md-12 col-sm-12 col-lg-12 mt-4">
            <div class="card">
              <div class="card-body">
                <span>Ventas anuladas</span>
              </div>
              <ul class="list-group list-group-flush">
                @php
                  $sw = 0;
                @endphp
                @foreach ($Ventas as $venta)
                  @if ($venta->estado == 2)
                    <li class="list-group-item">
                      @php
                        $fecha = $venta->created_at;
                        $inicio = strftime("%d de %B del %Y", strtotime($fecha));
                        echo '<span>Compra del '.$inicio.'</span>';
                      @endphp
                      <span class="float-right mr-4"> Total: {{$venta->total}}</span>
                    </li>
                  @else
                    @if ($sw == 0)
                      <li class="list-group-item text-center">
                        <span class="text-black-50">No tiene ventas anuladas</span>
                      </li>
                      @php
                        $sw = 1;
                      @endphp
                    @endif
                  @endif
                @endforeach
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
