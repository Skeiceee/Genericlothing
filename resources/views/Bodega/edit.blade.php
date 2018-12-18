@extends('Layouts.adminLayout')
@section('title',' - Modificar bodega')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_bodega" class="col-lg col-sm col-md">
        <form class="form-group" action="/admin/bodega/{{$Bodega->cod_bodega}}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Modificar bodega</span>
              </div>
              <div class="card-body">
                <label for="direccion_tienda">Direccion de la bodega</label>
                <input class="form-control" type="text" name="direccion_bodega" id="direccion_bodega" value="{{$Bodega->direccion_bodega}}">
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Ingresar</button>
                <a class="btn btn-primary float-right" href="{{ route('bodega.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
