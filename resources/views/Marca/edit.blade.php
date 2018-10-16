@extends('Layouts.adminLayout')
@section('title',' - Modificar marca')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_marca" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/marca/{{$Marca->cod_marca}}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Modificar marca</span>
              </div>
              <div class="card-body">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{$Marca->nombre}}">
                @if ($Marca->estado == 1)
                  <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-3">
                      <input type="checkbox" class="custom-control-input" value=0 name="estado" id="estado">
                      <label class="custom-control-label" for="estado">Activar la marca "{{$Marca->nombre}}"</label>
                    </div>
                @endif
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Modificar</button>
                <a class="btn btn-primary float-right" href="{{ route('marca.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
