@extends('Layouts.adminLayout')
@section('title', ' - Productos')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_producto" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Productos</span>
            </div>
            <div class="card-body">
              <table id="mostrar_producto" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio de venta</th>
                    <th>Codigo de tipo</th>
                    <th>Precio de venta</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Productos as $Producto)
                      @php
                        $nomMarca = DB::table('marca')->where('cod_marca', $Producto->cod_marca)->value('nombre');
                        $nomTipoProducto = DB::table('tipo-Producto')->where('cod_tipo_producto', $Producto->cod_tipo_producto)->value('nombre');
                      @endphp
                      <tr>
                      <td>{{$Producto->cod_producto}}</td>
                      <td>{{$Producto->nom_producto}}</td>
                      <td>{{$Producto->precio_venta}}</td>
                      <td>{{$nomMarca}}</td>
                      <td>{{$nomTipoProducto}}</td>
                      <td>{{$Producto->estado}}</td>
                      <td><a href="/admin/producto/{{$Producto->cod_producto}}" class="btn btn-primary">Ver</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
