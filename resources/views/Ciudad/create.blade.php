@extends('Layouts.adminLayout')
@section('title',' - Crear ciudad')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_ciudad" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/ciudad" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Agregar ciudad</span>
              </div>
              <div class="card-body">
                <label for="nom_ciudad">Nombre</label>
                <input class="form-control" type="text" name="nom_ciudad" id="nom_ciudad">
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Ingresar</button>
                <a class="btn btn-primary float-right" href="{{ route('ciudad.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
