@extends('Layouts.adminLayout')
@section('title',' - Existencia de Productos')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_existencia_producto" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Existencia de Productos</span>
            </div>
            <div class="card-body">
              <table id="mostrar_existencia_producto" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo Producto</th>
                    <th>Codigo Talla</th>
                    <th>Codigo Bodega</th>
                    <th>Codigo Tienda</th>
                    <th>Proveedor</th>
                    <th>Precio de Compra</th>
                    <th>Cantidad</th>
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
