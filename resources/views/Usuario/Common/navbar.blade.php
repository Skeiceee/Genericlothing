<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle float-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Productos
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      @foreach ($TipoProductos as $TipoProducto)
        <a class="dropdown-item" href="#">{{$TipoProducto->nombre}}</a>
      @endforeach
    </div>
</li>
