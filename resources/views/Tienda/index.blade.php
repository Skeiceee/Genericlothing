@extends('Layouts.adminLayout')
@section('title',' - Tiendas')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_tienda" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Tiendas</span>
            </div>
            <div class="card-body">
              <table id="mostrar_tienda" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo Tienda</th>
                    <th>Codigo Ciudad</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Tiendas as $Tienda)
                      <tr>
                          <td>{{$Tienda->cod_tienda}}</td>
                          <td>{{$Tienda->cod_ciudad}}</td>
                          <td>{{$Tienda->nom_tienda}}</td>
                          <td>{{$Tienda->direccion_tienda}}</td>
                          <td>{{$Tienda->estado}}</td>
                          <td>
                              <a class="btn btn-primary btn-sm" href="#">Editar</a>
                              <a class="btn btn-primary btn-sm" href="#">Eliminar</a>
                          </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card-footer">
                  <a class="btn btn-primary" href="{{ route('tienda.create') }}">Crear tienda</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
