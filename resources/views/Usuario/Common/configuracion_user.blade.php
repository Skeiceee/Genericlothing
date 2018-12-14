@extends('Layouts.index')
@section('title',' - Configuración de usuario')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_marca" class="col-lg-6 col-sm-12 col-md-6 mx-auto">
        @include('Common.errorProducto')
        @include('Common.success')
        <form class="form-group" action="/edit/user" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Configuración de usuario</span>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-sm-12 col-md-6">
                    <label for="nom_cliente">Nombre</label>
                    <input class="form-control" type="text" name="nom_cliente" id="nom_cliente" value="{{auth()->user()->nom_cliente}}">

                    <label for="apellido_paterno">Apellido paterno</label>
                    <input class="form-control" type="text" name="apellido_paterno" id="apellido_paterno" value="{{auth()->user()->apellido_paterno}}">

                    <label for="apellido_materno">Apellido materno</label>
                    <input class="form-control" type="text" name="apellido_materno" id="apellido_materno" value="{{auth()->user()->apellido_materno}}">
                  </div>
                  <div class="col-lg col-sm col-md">
                    <label for="telefono">Teléfono</label>
                    <input class="form-control" type="text" onkeypress="return check(event)" name="telefono" id="telefono" maxlength="9" value="{{auth()->user()->telefono}}">

                    <label for="ciudad">Ciudad</label>
                    <select class="form-control" name="ciudad" id="ciudad">
                        @foreach ($Ciudades as $Ciudad)
                            @if($Ciudad->cod_ciudad == auth()->user()->cod_ciudad)
                            <option selected value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                            @endif
                            <option value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

                <button class="btn btn-info mt-4" type="submit">Guardar mis datos</button>
                <a class="btn btn-info mt-4 float-right" href="{{route('home')}}">Volver</a>
              </div>
            </div>

            <!-- Modal de eliminar cuenta -->

              <a class="text-danger float-right" data-toggle="modal" data-target="#exampleModal" href="#">Eliminar cuenta</a>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="border-bottom: 0px">
                      <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro que quieres eliminar tu cuenta?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-footer" style="border-top: 0px">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                      <a class="btn btn-danger" href="{{ route('deleteUser') }}">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>

            <!---->

          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
@section('script')
    <script src="{{asset('js/solonumeros.js')}}"></script>
@endsection
