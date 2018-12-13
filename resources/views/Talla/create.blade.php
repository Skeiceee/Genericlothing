@extends('Layouts.adminLayout')
@section('title',' - Crear talla')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_talla" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/talla" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Registrar talla</span>
              </div>
              <div class="card-body">
                <label for="nombre">Codigo de la talla</label>
                <input class="form-control" type="text" name="cod_talla" id="cod_talla" maxlength="3" value="{{ old('cod_talla') }}">
                <label for="nombre">Descripción</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="100" value="{{ old('descripcion') }}">
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Ingresar</button>
                <a class="btn btn-primary float-right" href="{{ route('talla.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
