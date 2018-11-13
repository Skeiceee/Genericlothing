@extends('Layouts.app')
@section('title',' - Registro de usuario')
@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <i class="fas fa-user pr-1"></i>
                  {{ __('Registro') }}
                </div>
                <div class="card-body pb-2">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                          <div class="col-sm col-md-6 col-lg-6">
                            <div class="form-group">
                            <i class="fas fa-user-edit"></i>
                                <label for="nombre">{{ __('Nombre') }}</label>
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="apellido_paterno">{{ __('Apellido paterno') }}</label>
                                    <input id="apellido_paterno" type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autofocus>
                                    @if ($errors->has('apellido_paterno'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="apellido_materno">{{ __('Apellido materno') }}</label>
                                    <input id="apellido_materno" type="text" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" name="apellido_materno" value="{{ old('apellido_materno') }}" required autofocus>
                                    @if ($errors->has('apellido_materno'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('apellido_materno') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                            <i class="fas fa-city"></i>
                                <label for="ciudad">{{ __('Ciudad') }}</label>
                                    <select class="form-control" name="ciudad" id="ciudad">
                                        @foreach ($Ciudades as $Ciudad)
                                            <option value="{{$Ciudad->cod_ciudad}}">{{$Ciudad->nom_ciudad}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                            <i class="fas fa-phone"></i>
                                <label for="telefono">{{ __('Teléfono') }}</label>
                                <input id="telefono" type="tel" pattern="[0-9]{9}" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus>
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div> <!--Hola-->
                          <div class="col-sm col-md col-lg">

                            <div class="form-group">
                            <i class="fas fa-at"></i>
                            <label for="email">{{ __('Email') }}</label>
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                            </div>

                            <div class="form-group">
                            <i class="fab fa-slack-hash"></i>
                                <label for="rut">{{ __('Rut') }}</label>
                                    <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" id="rut" name="rut" required oninput="checkRut(this)" onkeypress="return check(event)" value="{{ old('rut') }}" required autofocus>
                                    @if ($errors->has('rut'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rut') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                            <i class="fas fa-key pr-1 mt-2"></i>
                                <label for="password">{{ __('Contraseña') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-1">
                                    {{ __('Registrar') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
  <script src="{{asset('js/rutvalido.js')}}"></script>
  <script src="{{asset('js/letrasynumeros.js')}}"></script>
@endsection
@endsection
