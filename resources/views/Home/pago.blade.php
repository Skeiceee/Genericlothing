@extends('Layouts.index')
@section('title',' - Pagar')
@section('content')
    <section class="container-fluid pt-4">
          <form class="form-group" action="/compra" method="post">
            @csrf
            <div class="container mx-auto">
              @include('Common.errorProducto')
              @include('Common.success')
              <div class="row">
                <div class="col-lg-8 col-sm-12 col-lg-8">
                  <div class="form-group">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Nombre completo: {{auth()->user()->nom_cliente}} {{auth()->user()->apellido_paterno}} {{auth()->user()->apellido_materno}}</li>
                      <li class="list-group-item">Rut: {{auth()->user()->rut_cliente}}</li>
                      <li class="list-group-item">Telefono: {{auth()->user()->telefono}}</li>
                    </ul>
                  </div>
                  <div class="form-group pl-3">
                    <label for="cod_ciudad">Ciudad de envio</label>
                    <select class="form-control" name="cod_ciudad">
                      @foreach ($Ciudades as $Ciudad)
                          <option value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                      @endforeach
                    </select>
                    <label for="eor">¿Envio o retiro en tienda?</label>
                    <select class="form-control" name="eor">
                      <option value="1">Envio</option>
                      <option value="2">Retiro en tienda</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg col-sm col-lg">
                  <div class="card">
                    <div class="card-header">
                        <i class="fas fa-credit-card"></i>
                        <span>Pago con tarjeta</span>
                    </div>
                    <div class="card-body">
                        <div class="col-lg col-sm col-lg-8">
                          <div class="form-group">
                              <label for="nroTarjeta">Numero de tarjeta</label>
                              <input class="form-control" type="text" name="nroTarjeta" id="nroTarjeta" value="">
                          </div>
                          <button class="btn btn-primary btn-block" type="sumbit" name="button">Confirmar Compra</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </form>
    </section>
@endsection
