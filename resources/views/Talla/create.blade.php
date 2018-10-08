@extends('Layouts.adminLayout')
@section('title',' - Crear talla')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_talla" class="col-lg col-sm col-md">
        <form class="form-group" action="/admin/talla" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Registrar talla</span>
              </div>
              <div class="card-body">
                <label for="nombre">Descripcion</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion">
                <button class="btn btn-primary mt-4" type="submit">Ingresar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
