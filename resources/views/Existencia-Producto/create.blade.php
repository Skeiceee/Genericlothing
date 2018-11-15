@extends('Layouts.adminLayout')
@section('title',' - Crear ciudad')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div id="registrar_ciudad" class="col-lg-10 col-sm-12 col-md-10 mx-auto">
        @include('Common.errorProducto')
        <form class="form-group" action="/admin/existencia-producto" method="post">
          @csrf
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <span>Agregar existencia de producto</span>
              </div>
              <div class="card-body">

                <label for="cod_producto">Nombre del producto</label>
                <select class="form-control" name="cod_producto" id="cod_producto">
                @if($Producto != null)
                    <option value="{{$Producto->cod_producto}}">{{$Producto->nom_producto}}</option>
                @else
                  @foreach ($Productos as $Producto)
                    @if ($Producto->estado == 0)
                    <option value="{{$Producto->cod_producto}}">{{$Producto->nom_producto}}</option>
                    @endif
                  @endforeach
                @endif
                </select>

                <label for="cod_talla">Talla</label>
                <select class="form-control" name="cod_talla" id="cod_talla">
                  @foreach ($Tallas as $Talla)
                    @if ($Talla->estado == 0)
                    <option value="{{$Talla->cod_talla}}">{{$Talla->cod_talla}}</option>
                    @endif
                  @endforeach
                </select>

                <label for="cod_bodega">Direccion de la bodega</label>
                <select class="form-control" name="cod_bodega" id="cod_bodega">
                  @foreach ($Bodegas as $Bodega)
                    @if ($Bodega->estado == 0)
                    <option value="{{$Bodega->cod_bodega}}">{{$Bodega->direccion_bodega}}</option>
                    @endif
                  @endforeach
                </select>

                <label for="proveedor">Proveedor</label>
                <input class="form-control" type="text" id="proveedor" name="proveedor">

                <label for="precio_compra">Precio de compra</label>
                <input class="form-control" type="text" id="precio_compra" name="precio_compra">

                <label for="cantidad">Cantidad</label>
                <input class="form-control" type="text" id="cantidad" name="cantidad">

              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Ingresar</button>
                <a class="btn btn-primary float-right" href="{{ route('existencia-producto.index') }}">Volver</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
