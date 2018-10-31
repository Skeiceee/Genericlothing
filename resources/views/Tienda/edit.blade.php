@extends('Layouts.adminLayout')
@section('title',' - Modificar tienda')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_tienda" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/tienda/{{$Tienda->cod_tienda}}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Modificar tienda</span>
              </div>
              <div class="card-body">
                <label for="ciudad">Ciudad</label>
                <select class="form-control" name="ciudad" id="ciudad">
                    @foreach ($Ciudades as $Ciudad)                      
                      @if($Ciudad->cod_ciudad == $Tienda->cod_ciudad)
                        <option selected="true" value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                      @else
                        <option value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                      @endif
                    @endforeach
                </select>

                <label for="nom_tienda">Nombre</label>
                <input class="form-control" type="text" name="nom_tienda" id="nom_tienda">

                <label for="direccion_tienda">Direccion de la tienda</label>
                <input class="form-control" type="text" name="direccion_tienda" id="direccion_tienda">

              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Modificar</button>
                <a class="btn btn-primary float-right" href="{{ route('tienda.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
