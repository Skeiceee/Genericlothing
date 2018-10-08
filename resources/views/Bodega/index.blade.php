@extends('Layouts.adminLayout')
@section('title',' - Bodegas')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_bodega" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Bodegas</span>
            </div>
            <div class="card-body">
              <table id="mostrar_bodega" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo Bodega</th>
                    <th>Codigo Tienda</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Bodegas as $Bodega)
                      <tr>
                          <td>{{$Bodega->cod_bodega}}</td>
                          <td>{{$Bodega->cod_tienda}}</td>
                          <td>{{$Bodega->direccion_bodega}}</td>
                          <td>{{$Bodega->estado}}</td>
                          <td>
                              <a class="btn btn-primary btn-sm" href="#">Editar</a>
                              <a class="btn btn-primary btn-sm" href="#">Eliminar</a>
                          </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card-footer">
                  <a class="btn btn-primary" href="{{ route('bodega.create') }}">Crear bodega</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
