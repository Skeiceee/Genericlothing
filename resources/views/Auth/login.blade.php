@extends('Layouts.app')
@section('title',' - Iniciar sesion')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-user pr-1"></i>
            <span>Iniciar sesion</span>
          </div>
          <div class="card-body">
            <form class="form-group" action="{{route('login')}}" method="post">
              @csrf
              <div class="form-group">
                <i class="fas fa-at"></i>
                <label for="email">Email</label>
                <input class="form-control "type="text" name="email" value="{{old('email')}}">
                {!! $errors->first('email', '<div class="alert alert-danger mt-2">:message</div>')!!}
                <i class="fas fa-key pr-1 mt-2"></i>
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password">
                {!! $errors->first('password', '<div class="alert alert-danger mt-2">:message</div>')!!}
              </div>
              <button class="btn btn-primary btn-block" type="sumbit" name="button">Acceder</button>
            </form>
            <div class="text-center">¿No tiene un usuario? Registrese <a href="{{route('register')}}">aquí.</a></div>
            <div class="text-center">¿No recuerda su contraseña? Haga click <a href="{{route('reset')}}">aquí.</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
