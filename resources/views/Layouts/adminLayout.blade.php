<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{{ asset('faviconadmin.png') }}}">
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

                  <div class="btn-group" style="margin:5px;">
                      <a class="btn btn-primary" href="/admin/producto">Productos</a>
                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="/admin/marca">Marcas</a>
                          <a class="dropdown-item" href="/admin/tipo-producto">Tipos de producto</a>
                          <a class="dropdown-item" href="/admin/talla">Tallas</a>
                          <a class="dropdown-item" href="/admin/existencia-producto">Existencia de productos</a>
                      </div>
                  </div>

                  <div class="btn-group" style="margin:5px;">
                      <a class="btn btn-primary" href="/admin/user">Clientes</a>
                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="/admin/pedido">Pedidos</a>
                          <a class="dropdown-item" href="/admin/venta">Ventas</a>
                          <a class="dropdown-item" href="/admin/envio">Envíos</a>
                      </div>
                  </div>

                  <div class="btn-group" style="margin:5px;">
                      <a class="btn btn-primary" href="/admin/tienda">Tiendas</a>
                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="/admin/bodega">Bodegas</a>
                          <a class="dropdown-item" href="/admin/ciudad">Ciudades</a>
                      </div>
                  </div>

              </ul>

              <form class="form-inline my-2 my-lg-0" action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-danger" type="sumbit" name="button">Cerrar sesion</button>
              </form>
          </div>
      </nav>
  </header>
  <body>
  @yield('content')
  </body>
  <footer>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  @if(session('modal_existencia') && session('cod_producto') && session('nom_producto'))
  <script src="{{asset('js/proModal.js')}}"></script>
  @endif
  @yield('script')
</html>
