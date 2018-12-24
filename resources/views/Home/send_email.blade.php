@extends('Layouts.index')
@section('title','- Politicas de privacidad')
@section('content')
<section class="container-fluid mt-4 pl-4">
  <div class="row mx-auto pl-4">
    <div class="col-lg-6 col-sm-12 col-md-6 mx-auto">
      @include('Common.errorProducto')
      @include('Common.success')
      <div class="card">
        <div class="card-body">
          <form class="form-group" action="{{ url('sendemail/send')}}" method="post">
            @csrf
            <div>
              <label for="name">Ingrese su nombre</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div>
              <label for="email">Ingrese su email</label>
              <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div>
              <label for="message">Ingrese su mensaje</label>
              <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            <div>
              <button type="sumbit" name="button" class="btn btn-info btn-block mt-4"> Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="text-center mt-4">
    <span class="small">&copy; Genericlothing 2018, Todos los derechos reservados.</span>
  </div>
  <div class="text-center mb-4">
    <span class="small">
     <a class="text-dark" href="{{ route('sendemail') }}">Contacto</a> · <a class="text-dark" href="{{ route('politicas' )}}">Politicas de privacidad</a>
    </span>
  </div>
</footer>
@endsection
