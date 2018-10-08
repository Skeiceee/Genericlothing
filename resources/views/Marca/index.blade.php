@extends('Layouts.adminLayout')
@section('title',' - Marcas')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_marca" class="col-lg col-sm col-md">
        @include('Common.success')
        <div class="card ">
            <div class="card-header">
              <span>Marcas</span>
            </div>
            <div class="card-body">
              <table id="mostrar_marca" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Marcas as $Marca)
                      <tr>
                      <td>{{$Marca->cod_marca}}</td>
                      <td>{{$Marca->nombre}}</td>
                      <td>{{($Marca->estado == 0) ? 'Activo' : 'Eliminado'}}</td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="#">Editar</a>
                          <a class="btn btn-primary btn-sm" href="#">Eliminar</a>
                      </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card-footer">
                  <a class="btn btn-primary" href="{{ route('marca.create') }}">Crear marca</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
