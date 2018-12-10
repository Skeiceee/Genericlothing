@extends('Layouts.index')
@section('title','- Carro de compras')
@section('content')
@php
    $Total = 0;
@endphp
<section class="container-fluid px-0 pt-4">
    <div class="container px-0 mt-4">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
              <table class="table">
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Talla</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Subtotal</th>
                          <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($DetallesPedido as $DetallePedido)
                          @php
                          $Producto = DB::table('producto')
                              ->where('cod_producto', '=', $DetallePedido->cod_producto)
                              ->first();
                          $Total = $Total + $DetallePedido->subtotal;
                          @endphp
                          <tr>
                              <td>{{$Producto->nom_producto}}</td>
                              <td>{{$DetallePedido->cod_talla}}</td>
                              <td>{{$DetallePedido->cantidad}}</td>
                              <td>${{ number_format($DetallePedido->precio_venta, 0, ',','.') }}</td>
                              <td>${{ number_format($DetallePedido->subtotal, 0, ',','.') }}</td>
                              <td><a class="btn btn-danger btn-sm" href="eliminardetalle/{{$DetallePedido->cod_producto}}/{{$DetallePedido->cod_talla}}"><i class="fas fa-trash"></i></a></td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              <h3><span class="float-left badge badge-info mt-4">Total: ${{number_format($Total, 0, ',','.')}}</span></h3>
              @if (auth()->user()->detallePedidoEmpty(auth()->user()->rut_cliente) == false)
                <a class="btn btn-info float-right mt-4" href="pago">Comprar</a>
              @else
                <a class="btn btn-danger float-right mt-4" href="/home">Agregar productos al carrito</a>
              @endif
          </div>
      </div>
    </div>
</section>
@endsection
