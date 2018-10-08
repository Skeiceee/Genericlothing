@extends('Layouts.adminLayout')
@section('title',' - Envíos')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_envio" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Envíos</span>
            </div>
            <div class="card-body">
              <table id="mostrar_envío" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo Venta</th>
                    <th>Rut cliente</th>
                    <th>Codigo Ciudad</th>
                    <th>Telefono</th>
                    <th>Precio Envío</th>
                    <th>Estado</th>
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    <!--insertar datatable-->
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
