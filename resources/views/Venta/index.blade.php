@extends('Layouts.adminLayout')
@section('title',' - Ventas')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_venta" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Ventas</span>
            </div>
            <div class="card-body">
              <table id="mostrar_venta" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo</th>
                    <th>Rut cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Envío</th>
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
