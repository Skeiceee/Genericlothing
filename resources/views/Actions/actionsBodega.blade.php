<a class="btn btn-primary btn-sm" href="{{ route('bodega.edit', $cod_bodega) }}"><i class="fas fa-edit"></i></a>
<!--Trigger Modal -->
<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#bodega_{{$cod_bodega}}"><i class="fas fa-trash-alt text-white"></i></a>
<!-- Modal -->
<div class="modal fade" id="bodega_{{$cod_bodega}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminacion de una bodega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea eliminar esta bodega?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger" href="{{route('Bodega.delete', $cod_bodega)}}?{{time()}}">Eliminar</a>
      </div>
    </div>
  </div>
</div>
