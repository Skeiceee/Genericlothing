@extends('Layouts.adminLayout')
@section('title',' - Tipo de productos')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_tipo_producto" class="col-lg col-sm col-md">
      @include('Common.success')
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
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($TipoProductos as $TipoProducto)
                      <tr>
                      <td>{{$TipoProducto->cod_tipo_producto}}</td>
                      <td>{{$TipoProducto->nombre}}</td>
                      <td>{{($TipoProducto->estado == 0) ? 'Activo' : 'Eliminado'}}</td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="#">Editar</a>
                          <a class="btn btn-primary btn-sm" href="#">Eliminar</a>
                      </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card-footer">
                  <a class="btn btn-primary" href="{{ route('tipo-producto.create') }}">Crear tipo de producto</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
