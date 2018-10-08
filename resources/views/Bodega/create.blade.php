@extends('Layouts.adminLayout')
@section('title',' - Crear bodega')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_bodega" class="col-lg col-sm col-md">
        <form class="form-group" action="/admin/bodega" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Agregar bodega</span>
              </div>
              <div class="card-body">
                <label for="tienda">Tienda</label>
                <select class="form-control" name="tienda" id="tienda">
                    @foreach ($Tiendas as $Tienda)
                        <option value="{{$Tienda->cod_tienda}}">{{$Tienda->nom_tienda}}</option>
                    @endforeach
                </select>

                <label for="direccion_tienda">Direccion de la bodega</label>
                <input class="form-control" type="text" name="direccion_bodega" id="direccion_bodega">

                <button class="btn btn-primary mt-4" type="submit">Ingresar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
