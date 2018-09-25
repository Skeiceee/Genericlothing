@extends('Layouts.app')
@section('title',' - Iniciar sesion')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card">
          <div class="card-header">
            <span>Iniciar sesion</span>
          </div>
          <div class="card-body">
            <form class="form-group" action="{{route('login')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control "type="text" name="email" value="{{old('email')}}">
                {!! $errors->first('email', '<div class="alert alert-danger mt-2">:message</div>')!!}
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password">
                {!! $errors->first('password', '<div class="alert alert-danger mt-2">:message</div>')!!}
              </div>
              <button class="btn btn-primary btn-block" type="sumbit" name="button">Acceder</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
