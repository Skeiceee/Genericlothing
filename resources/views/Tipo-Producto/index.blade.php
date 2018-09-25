@extends('Layouts.adminLayout')
@section('title',' - Tipo de productos')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_tipo_producto" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Tipos de productos</span>
            </div>
            <div class="card-body">
              <table id="mostrar_tipo_productos" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($TipoProductos as $TipoProducto)
                      <tr>
                      <td>{{$TipoProducto->cod_tipo_producto}}</td>
                      <td>{{$TipoProducto->nombre}}</td>
                      <td>{{$TipoProducto->estado}}</td>
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
