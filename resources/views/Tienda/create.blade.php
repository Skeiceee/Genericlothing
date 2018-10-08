@extends('Layouts.adminLayout')
@section('title',' - Crear tienda')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_tienda" class="col-lg col-sm col-md">
        <form class="form-group" action="/admin/tienda" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Agregar tienda</span>
              </div>
              <div class="card-body">
                <label for="ciudad">Ciudad</label>
                <select class="form-control" name="ciudad" id="ciudad">
                    @foreach ($Ciudades as $Ciudad)
                        <option value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                    @endforeach
                </select>

                <label for="nom_tienda">Nombre</label>
                <input class="form-control" type="text" name="nom_tienda" id="nom_tienda">

                <label for="direccion_tienda">Direccion de la tienda</label>
                <input class="form-control" type="text" name="direccion_tienda" id="direccion_tienda">

                <button class="btn btn-primary mt-4" type="submit">Ingresar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
