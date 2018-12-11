<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    @yield('css')
    <title>Genericlothing @yield('title')</title>
  </head>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{route('home')}}">Genericlothing</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          @include('Usuario.Common.navbar')
        </ul>
        @if (auth()->user()->estado == "2")
            <a class="btn btn-primary mr-2" href="{{route('admin')}}">Panel de administración<span class="sr-only"></span></a>
        @endif

        <a id="car-shop" class="badge badge-pill badge-light mr-2" href="{{route('carro')}}">
          <i class="fas fa-shopping-cart"></i> <span id="num-items"></span>
          <span class="sr-only">Productos en el carrito</span>
        </a>

        <div class="nav-item dropdown pr-2">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{auth()->user()->nom_cliente.' '.auth()->user()->apellido_paterno}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('configuracion')}}">Configuración</a>
                  <form class="form-inline my-2 my-lg-0" action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="dropdown-item" type="sumbit" name="button">Cerrar sesion</button>
                  </form>
                </div>
        </div>
      </div>
    </nav>
  </header>
  <body>
    @if (session()->has('flash'))
      <section class="row">
      <div class="col-sm col-md-12 col-lg-12 mt-4 px-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span>{{session('flash')}}</span>
        </div>
      </div>
    </section>
    @endif

    @yield('content')

  </body>
  <footer>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="{{asset('js/ajax/ajaxupdatecarro.js')}}"></script>
  @yield('script')
</html>
