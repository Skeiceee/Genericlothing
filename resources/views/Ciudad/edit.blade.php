@extends('Layouts.adminLayout')
@section('title',' - Crear ciudad')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_ciudad" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        @include('Common.success')
        <form class="form-group" action="/admin/ciudad/{{$Ciudad->cod_ciudad}}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Modificar ciudad</span>
              </div>
              <div class="card-body">
                <label for="nom_ciudad">Nombre</label>
                <input class="form-control" type="text" name="nom_ciudad" id="nom_ciudad" value="{{$Ciudad->nom_ciudad}}">
                <button class="btn btn-primary mt-4" type="submit">Modificar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
