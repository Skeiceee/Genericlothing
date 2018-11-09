@extends('Layouts.adminLayout')
@section('title',' - Modificar tienda')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_tienda" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/tienda/{{$Tienda->cod_tienda}}" method="post">
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Tienda "{{$Tienda->nom_tienda}}"</span>
              </div>
              <div class="card-body pb-1">
                @php
                  if($Tienda->estado == 0){
                    $str = 'Activo';
                  }else if($Producto->estado == 1){
                    $str = 'Eliminado';
                  }
                @endphp
                <table class="table table-bordered table-hover table-striped">
                  <tr>
                    <td>Codigo:</td>
                    <td>{{$Tienda->cod_tienda}}</td>
                  </tr>
                  <tr>
                    <td>Nombre:</td>
                    <td>{{$Tienda->nom_tienda}}</td>
                  </tr>
                  <tr>
                    <td>Dirección:</td>
                    <td>{{$Tienda->direccion_tienda}}</td>
                  </tr>
                  <tr>
                    <td>Estado:</td>
                    <td>{{$str}}</td>
                  </tr>
                </table>
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <th>Direcciones de las bodegas</th>
                  </thead>
                  <tbody>
                    @php
                    if(!$Bodegas->isEmpty()){
                      foreach ($Bodegas as $Bodega) {
                        echo '<tr>';
                          echo '<td>';
                            echo '<div>'.$Bodega->direccion_bodega.'</div>';
                          echo '</td>';
                        echo '</tr>';
                      }
                    }else {
                      echo '<tr>';
                        echo '<td>';
                          echo '<div>Esta tienda no tiene ninguna bodega asociada.</div>';
                        echo '</td>';
                      echo '</tr>';
                    }
                    @endphp
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Modificar</button>
                <a class="btn btn-primary float-right" href="{{ route('tienda.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
