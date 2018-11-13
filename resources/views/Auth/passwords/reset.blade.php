@extends('Layouts.app')
@section('title',' - Resetear contraseña')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        @include('Common.errorProducto')
        <div class="card">
          <div class="card-header">
            <i class="fas fa-user pr-1"></i>
            <span>Reseteo de contraseña</span>
          </div>
          <div class="card-body">
            <form class="form-group" action="{{route('password.send')}}" method="post">
              @csrf
              <div class="form-group">
                <i class="fas fa-at"></i>
                <label for="email">Email</label>
                <input class="form-control "type="email" name="email" id="email" value="{{ $email }}">

                <i class="fas fa-key pr-1 mt-2"></i>
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" id="password" name="password">

                <i class="fas fa-key pr-1 mt-2"></i>
                <label for="password_confirmation">Repetir contraseña</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" >

                <input type="hidden" name="token" value="{{ $token }}">

              </div>
              <button class="btn btn-primary btn-block" type="sumbit">Cambiar contraseña</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
