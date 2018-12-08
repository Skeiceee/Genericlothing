@extends('Layouts.adminLayout')
@section('title','- Pedidos')
@section('content')
@php
    $Total = 0;
    $Usuario = DB::table('cliente')
        ->where('rut_cliente', '=', $Pedido->rut_cliente)
        ->first();
@endphp
<section class="container-fluid pt-4">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <span>Pedido del usuario {{$Usuario->nom_cliente}} {{$Usuario->apellido_paterno}}</span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
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
                    <h3><span class="badge badge-info">Total: ${{$Total}} </span></h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
