@extends('Layouts.adminLayout')
@section('title',' - Modificar tipo de producto')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_tipo_producto" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/tipo-producto/{{$TipoProducto->cod_tipo_producto}}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Modificar tipo de producto</span>
              </div>
              <div class="card-body">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{$TipoProducto->nombre}}">
                @if ($TipoProducto->estado == 1)
                  <div class="custom-control custom-checkbox my-1 mr-sm-2 mt-3">
                      <input type="checkbox" class="custom-control-input" value=0 name="estado" id="estado">
                      <label class="custom-control-label" for="estado">Activar el tipo de producto "{{$TipoProducto->nombre}}"</label>
                    </div>
                @endif
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Modificar</button>
                <a class="btn btn-primary float-right" href="{{ route('tipo-producto.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
