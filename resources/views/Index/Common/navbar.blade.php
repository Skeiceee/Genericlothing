<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle float-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Productos
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($TipoProductos as $TipoProducto)
      <a class="dropdown-item" href="/guest/filtro/tipo/{{$TipoProducto->cod_tipo_producto}}">{{$TipoProducto->nombre}}</a>
    @endforeach
  </div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle float-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Marcas
</a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($Marcas as $Marca)
      <a class="dropdown-item" href="/guest/filtro/marca/{{$Marca->cod_marca}}">{{$Marca->nombre}}</a>
    @endforeach
  </div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle float-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Tallas
</a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($Tallas as $Talla)
      <a class="dropdown-item" href="/guest/filtro/talla/{{$Talla->cod_talla}}">{{$Talla->cod_talla}}</a>
    @endforeach
  </div>
</li>
