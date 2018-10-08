@extends('Layouts.adminLayout')
@section('title',' - Tallas')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_talla" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Tallas</span>
            </div>
            <div class="card-body">
              <table id="mostrar_talla" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Tallas as $Talla)
                      <tr>
                          <td>{{$Talla->cod_talla}}</td>
                          <td>{{$Talla->descripcion}}</td>
                          <td>{{$Talla->estado}}</td>
                          <td>
                              <a class="btn btn-primary btn-sm" href="#">Editar</a>
                              <a class="btn btn-primary btn-sm" href="#">Eliminar</a>
                          </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card-footer">
                  <a class="btn btn-primary" href="{{ route('talla.create') }}">Crear talla</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
