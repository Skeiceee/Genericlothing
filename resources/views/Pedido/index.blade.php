@extends('Layouts.adminLayout')
@section('title',' - Pedidos')
@section('content')
@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_pedido" class="col-lg col-sm col-md">
        @include('Common.success')
        <div class="card ">
            <div class="card-header">
              <span>Pedidos</span>
            </div>
            <div class="card-body">
            <div class="container-fluid table-responsive">
              <table id="Pedidos" class="table table-bordered table-hover table-striped dt-responsive display nowrap" cellspacing="0"
                width="100%">
                <thead class = "theade-danger">
                  <tr>
                    <th>Codigo</th>
                    <th>Rut cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th class="no-sort" width=10>Acciones</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
      <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

      <script>
        $(document).ready(function(){
            $('#Pedidos').DataTable({
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
               "ajax":'{{url('api/Pedidos')}}',
               "columnDefs": [ {
                 "targets": 'no-sort',
                 "orderable": false,
                 "searchable": false,
               }],
               "columns":[
                 {data: 'cod_pedido', name: 'e.cod_pedido'},
                 {data: 'rut_cliente', name: 'd.rut_cliente'},
                 {data: 'fecha', name: 'e.fecha'},
                 {data: 'total', name: 'e.total'},
                 {data: 'btn'},
               ]
            });
        });
  </script>
@endsection
