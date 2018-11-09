<a class="btn btn-primary btn-sm " href="{{ route('marca.edit', $cod_marca) }}"><i class="fas fa-edit"></i></a>
<!--Trigger Modal -->
<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#marca_{{$cod_marca}}"><i class="fas fa-trash-alt text-white"></i></a>
<!-- Modal -->
<div class="modal fade" id="marca_{{$cod_marca}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminacion de la talla "{{$nombre}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea eliminar esta marca?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger" href="{{route('Marca.delete', $cod_marca)}}?{{time()}}">Eliminar</a>
      </div>
    </div>
  </div>
</div>
