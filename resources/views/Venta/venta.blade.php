@extends('Layouts.adminLayout')
@section('title',' - Detalle de venta')
@php
    $Total = 0;
    $Usuario = DB::table('cliente')
        ->where('rut_cliente', '=', $Venta->rut_cliente)
        ->first();
@endphp
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_envio" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                  <span>Detalle de la venta {{$Venta->cod_venta}} de {{$Usuario->nom_cliente}} {{$Usuario->apellido_paterno}}</span>
              </div>
              <div class="card-body pb-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($DetallesVentas as $DetallesVenta)
                            @php
                            $Producto = DB::table('producto')
                                ->where('cod_producto', '=', $DetallesVenta->cod_producto)
                                ->first();
                              $Total = $Total + $DetallesVenta->subtotal;
                            @endphp
                            <tr>
                                <td>{{$Producto->nom_producto}}</td>
                                <td>{{$DetallesVenta->cantidad}}</td>
                                <td>${{$DetallesVenta->precio_venta}}</td>
                                <td>${{$DetallesVenta->subtotal}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-sm-12 col-md-8">
                    <h3><span class="badge badge-primary">Total: ${{$Total}} </span></h3>
                  </div>
                  <div class="col-md col-sm col-md">
                    <a class="btn btn-primary float-right" href="{{ route('venta.index') }}">Volver</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection
