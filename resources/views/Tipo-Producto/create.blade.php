@extends('Layouts.adminLayout')
@section('title',' - Crear tipo de producto')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_tipo_producto" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/tipo-producto" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Registrar tipo de producto</span>
              </div>
              <div class="card-body">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre">
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Ingresar</button>
                <a class="btn btn-primary float-right" href="{{ route('tipo-producto.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
