@extends('Layouts.adminLayout')
@section('title',' - Clientes')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="mostrar_cliente" class="col-lg col-sm col-md mt-4">
        <div class="card ">
            <div class="card-header">
              <span>Clientes</span>
            </div>
            <div class="card-body">
              <table id="mostrar_cliente" class="table table-bordered table-hover table-striped">
                <thead class = "theade-danger">
                  <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Teléfono</th>
                    <th>Ciudad</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Estado</th>
                    <th class="no-sort" width=20%>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Users as $User)
                      <tr>
                          <td>{{$User->rut_cliente}}</td>
                          <td>{{$User->nom_cliente}}</td>
                          <td>{{$User->apellido_paterno}}</td>
                          <td>{{$User->apellido_materno}}</td>
                          <td>{{$User->telefono}}</td>
                          {{ $Nombre = DB::table('ciudad')->where('cod_ciudad',$User->cod_ciudad)->value('nom_ciudad')}}
                          <td>{{$Nombre}}</td>
                          <td>{{$User->email}}</td>
                          <td>{{$User->password}}</td>
                          <td>{{($User->estado == 0) ? 'Activo' : (($User->estado == 1) ? 'Eliminado' : 'Administrador')}}</td>
                          <td>
                              <a class="btn btn-primary btn-sm" style="margin:2px" href="#">Editar</a>
                              <a class="btn btn-primary btn-sm" style="margin:2px" href="#">Eliminar</a>
                          </td>
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
