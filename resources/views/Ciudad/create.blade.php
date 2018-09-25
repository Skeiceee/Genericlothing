@extends('Layouts.adminLayout')
@section('title',' - Crear ciudad')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_ciudad" class="col-lg col-sm col-md">
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
                <button class="btn btn-primary mt-4" type="submit">Ingresar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
