@extends('Layouts.adminLayout')
@section('title','- Detalle de pedido')
@section('content')
@php
    $Total = 0;
    $Usuario = DB::table('cliente')
        ->where('rut_cliente', '=', $Pedido->rut_cliente)
        ->first();
@endphp
<section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_pedido" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Pedido del usuario {{$Usuario->nom_cliente}} {{$Usuario->apellido_paterno}}</span>
                </div>
                <div class="card-body">
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
                            @foreach($DetallesPedido as $DetallePedido)
                                @php
                                $Producto = DB::table('producto')
                                    ->where('cod_producto', '=', $DetallePedido->cod_producto)
                                    ->first();
                                $Total = $Total + $DetallePedido->subtotal;
                                @endphp
                                <tr>
                                    <td>{{$Producto->nom_producto}}</td>
                                    <td>{{$DetallePedido->cantidad}}</td>
                                    <td>${{$DetallePedido->precio_venta}}</td>
                                    <td>${{$DetallePedido->subtotal}}</td>
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
                      <a class="btn btn-primary float-right" href="{{ route('pedido.index') }}">Volver</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
