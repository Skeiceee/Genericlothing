@extends('Layouts.index')
@section('title',' - Pagar')
@section('content')
    <section class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                @include('Common.success')
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-credit-card"></i>
                        <span>Pago con tarjeta</span>
                    </div>
                    <div class="card-body">
                        <form class="form-group" action="/venta" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nroTarjeta">Numero de tarjeta</label>
                                <input class="form-control" type="text" name="nroTarjeta" id="nroTarjeta" value="">
                            </div>
                            <button class="btn btn-primary btn-block" type="sumbit" name="button">Confirmar Compra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
