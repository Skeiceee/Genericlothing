@extends('Layouts.adminLayout')
@section('title',' - Marcas')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_marca" class="col-lg col-sm col-md mt-4">
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
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Marcas as $Marca)
                      <tr>
                      <td>{{$Marca->cod_marca}}</td>
                      <td>{{$Marca->nombre}}</td>
                      <td>{{$Marca->estado}}</td>
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
