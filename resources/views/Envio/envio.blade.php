@extends('Layouts.adminLayout')
@section('title',' - Confirmar envío')
@php
    $Total = 0;
    $Usuario = DB::table('cliente')
        ->where('rut_cliente', '=', $Venta->rut_cliente)
        ->first();
    $nombre_usuario = $Usuario->nom_cliente.' '.$Usuario->apellido_paterno.' '.$Usuario->apellido_materno;
@endphp
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_envio" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        <table class="table table-hover table-bordered table-light">
               <thead class="thead">
                   <tr>
                       <th>Producto</th>
                       <th>Talla</th>
                       <th>Cantidad</th>
                       <th>Precio venta</th>
                       <th>Subtotal</th>
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
                         <td>{{$DetallesVenta->cod_talla}}</td>
                         <td>{{$DetallesVenta->cantidad}}</td>
                         <td>${{ number_format($DetallesVenta->precio_venta, 0, ',','.') }}</td>
                         <td>${{ number_format($DetallesVenta->subtotal, 0, ',','.') }}</td>
                     </tr>
                 @endforeach
               </tbody>
           </table>
            <table class="table table-bordered">
              <thead class="thead">
                  <tr>
                      <th>Nombre del cliente</th>
                      <th>Rut</th>
                      <th>Total</th>
                      <th>Ciudad de envio</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td> {{$nombre_usuario}} </td>
                  <td> {{$Venta->rut_cliente}} </td>
                  <td> ${{ number_format($Total, 0, ',','.') }}</td>
                  <td> {{$nomCiudad}} </td>
                </tr>
              </tbody>
              <tr>

              </tr>
            </table>
            <div class="row">
              <div class="col">
                @if ($Envio->estado == 0)
                  <a class="btn btn-success btn-block" href="{{ route('Envio.delete', $Envio->cod_venta) }}">Concretar envio</a>
                @endif
              </div>
            </div>
      </div>
    </div>
  </section>
@endsection
