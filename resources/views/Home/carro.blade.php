@extends('Layouts.index')
@section('title','- Carro')
@section('content')
@php
    $Total = 0;
@endphp
<section class="container-fluid pt-4">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <span>Productos en el Carro</span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Producto</th>
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
                                    <td>{{$DetallePedido->cantidad}}</td>
                                    <td>${{$DetallePedido->precio_venta}}</td>
                                    <td>${{$DetallePedido->subtotal}}</td>
                                    <td><a class="btn btn-primary btn-sm" href=""><i class="fas fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <h3><span class="float-left badge badge-info">Total: ${{$Total}} </span></h3>
                    <a class="btn btn-primary float-right" href="#">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
