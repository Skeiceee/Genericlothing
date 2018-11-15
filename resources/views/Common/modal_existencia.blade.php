@if(session('modal_existencia') && session('cod_producto') && session('nom_producto'))
  <!-- Modal -->
  <div class="modal fade" id="proModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agregar la existencia del producto "{{session('nom_producto')}}"</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          {{session('modal_existencia')}}
          @php
            $cod_producto = session('cod_producto');
          @endphp
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          <a class="btn btn-danger" href="{{route('ExistenciaProducto.create',$cod_producto)}}">Agregar</a>
        </div>
      </div>
    </div>
  </div>
@endif
