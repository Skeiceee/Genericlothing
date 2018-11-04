@extends('Layouts.adminLayout')
@section('title',' - Modificar talla')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_talla" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.success')
        <form class="form-group" action="/admin/talla/{{$Talla->cod_talla}}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Modificar talla</span>
              </div>
              <div class="card-body">
                <label for="nombre">Codigo de la talla</label>
                <input class="form-control" type="text" name="cod_talla" id="cod_talla" maxlength="3" value="{{$Talla->cod_talla}}">
                <label for="nombre">Descripción</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="100" value="{{$Talla->descripcion}}">
                @if ($Talla->estado == 1)
                  <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-3">
                      <input type="checkbox" class="custom-control-input" value=0 name="estado" id="estado">
                      <label class="custom-control-label" for="estado">Activar la talla "{{$Talla->cod_talla}}"</label>
                    </div>
                @endif
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Modificar</button>
                <a class="btn btn-primary float-right" href="{{ route('talla.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
