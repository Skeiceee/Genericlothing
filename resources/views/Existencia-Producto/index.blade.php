@extends('Layouts.adminLayout')
@section('title',' - Existencia de Productos')
@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_existencia_producto" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Existencia de Productos</span>
            </div>
            <div class="card-body">
              <table id="ExistenciaProductos"  class="table table-bordered table-hover table-striped dt-responsive display nowrap" cellspacing="0"
                width="100%">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo producto</th>
                    <th>Codigo bodega</th>
                    <th>Codigo talla</th>
                    <th>Nombre tienda</th>
                    <th>Proveedor</th>
                    <th>Precio de compra</th>
                    <th>Cantidad</th>
                    <th>Tiempo de creación</th>
                    <th>Tiempo de la ultima modificación</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('existencia-producto.create') }}">Crear existencia de producto</a>
            </div>
        </div>
      </div>
    </div>
  </section>
@section('script')
  <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function(){
        $('#ExistenciaProductos').DataTable({
          "bAutoWidth": false,
          "language":{
               "sProcessing":     "Procesando...",
               "sLengthMenu":     "Mostrar _MENU_ registros",
               "sZeroRecords":    "No se encontraron resultados",
               "sEmptyTable":     "Ningún dato disponible en esta tabla",
               "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
               "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
               "sInfoPostFix":    "",
               "sSearch":         "Buscar:",
               "sUrl":            "",
               "sInfoThousands":  ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                   "sFirst":    "Primero",
                   "sLast":     "Último",
                   "sNext":     "Siguiente",
                   "sPrevious": "Anterior"
               },
               "oAria": {
                   "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"
               }
           },
           "destroy": true,
           "responsive": true,
           "serverSide":true,
           "ajax":'{{url('api/ExistenciaProductos')}}',
           "columnDefs": [ {
             "targets": 'no-sort',
             "orderable": false,
             "searchable": false,
           }],
           "columns":[
             {data: 'cod_producto', name: 'e.cod_producto'},
             {data: 'cod_bodega', name: 'e.cod_bodega'},
             {data: 'cod_talla', name: 'e.cod_talla'},
             {data: 'nombre_tienda', name: 'd.nom_tienda'},
             {data: 'proveedor', name: 'e.proveedor'},
             {data: 'precio_compra', name: 'e.precio_compra'},
             {data: 'cantidad', name: 'e.cantidad'},
             {data: 'created_at', name: 'e.created_at'},
             {data: 'updated_at', name: 'e.updated_at'},
           ]
        });
    });
  </script>
@endsection
@endsection
