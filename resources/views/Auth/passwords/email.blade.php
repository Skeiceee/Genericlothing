@extends('Layouts.sinnavbar')
@section('title',' - Resetear contraseña')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        @include('Common.success')
        <div class="card">
          <div class="card-header">
            <i class="fas fa-user pr-1"></i>
            <span>Resetear contraseña</span>
          </div>
          <div class="card-body">
            <form class="form-group" action="{{route('password.email')}}" method="post">
              @csrf
              <div class="form-group">
                <i class="fas fa-at"></i>
                <label for="email">Email</label>
                <input class="form-control "type="email" name="email" id="email" value="{{old('email')}}">
              </div>
              <button class="btn btn-primary btn-block" type="sumbit" name="button">Enviar email</button>
            </form>
        </div>
      </div>
    </div>
  </section>
@endsection
