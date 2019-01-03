@extends('Layouts.adminLayout')
@section('title',' - Confirmar venta')
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
      <div id="registrar_venta" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
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

           @if ($Venta->envio == '1')
               <table class="table table-bordered">
                 <thead class="thead">
                     <tr>
                         <th>Nombre del cliente</th>
                         <th>Rut</th>
                         <th>Total</th>
                         <th>Tienda de retiro</th>
                     </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td> {{$nombre_usuario}} </td>
                     <td> {{$Venta->rut_cliente}} </td>
                     <td> ${{ number_format($Total, 0, ',','.') }}</td>
                     @php
                         $TiendaRetiro = DB::table('tienda')
                             ->where('cod_tienda', '=', $Venta->cod_tienda)
                             ->first();
                     @endphp
                     <td> {{$TiendaRetiro->nom_tienda}} </td>
                   </tr>
                 </tbody>
                 <tr>

                 </tr>
               </table>
           @endif

            <div class="row">
              <div class="col">
                @if ($Venta->estado == '0' and $Venta->envio == '1')
                  <a class="btn btn-success btn-block" href="{{ route('Venta.delete', $Venta->cod_venta) }}">Concretar venta</a>
                @endif
                @if ($Venta->envio == '0')
                  <a class="btn btn-success btn-block" href="{{ route('Envio.confirmation', $Venta->cod_venta) }}">Ir al envío</a>
                @endif
              </div>
            </div>
      </div>
    </div>
  </section>
@endsection
