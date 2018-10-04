@extends('Layouts.adminLayout')
@section('title', ' - Productos')
@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div class="col-lg-3 col-sm-12 col-md-3">
        <a class="btn btn-primary btn-block" href="{{ route('producto.create') }}">Crear producto</a>
      </div>
    </div>
    <div class="row">
      <div id="mostrar_producto" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Productos</span>
            </div>
            <div class="card-body">
                <div class="container-fluid table-responsive">
                <table id="Productos" class="table table-bordered table-hover table-striped dt-responsive display nowrap" cellspacing="0"
                  width="100%">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio de venta</th>
                    <th>Marca</th>
                    <th>Tipo de producto</th>
                    <th>Estado</th>
                    <th class="no-sort mr-auto">Acciones</th>
                  </tr>
                </thead>
              </table>
              </div>
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
        $('#Productos').DataTable({
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
           "ajax":'{{url('api/Productos')}}',
           "columnDefs": [ {
             "targets": 'no-sort',
             "orderable": false,
             "searchable": false,
           }],
           "columns":[
             {data: 'cod_producto', name: 'e.cod_producto'},
             {data: 'nom_producto', name: 'e.nom_producto'},
             {data: 'precio_venta', name: 'e.precio_venta'},
             {data: 'nombre_marca', name: 'd.nombre'},
             {data: 'nombre_tipo', name: 'j.nombre'},
             {data: 'estado', name: 'e.estado'},
             {data: 'btn'},
           ]
        });
    });
  </script>
@endsection
@endsection
