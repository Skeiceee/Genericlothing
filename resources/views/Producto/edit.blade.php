@extends('Layouts.adminLayout')
@section('title',' - Modificar producto')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
        <div id='modificar_producto' class="col-lg-10 col-sm-12 col-md-10 mx-auto">
          @if($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger">
                <span>{{$error}}</span>
              </div>
            @endforeach
          @endif
          <form class="form-group" action="/admin/producto/{{$Producto->cod_producto}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <div class="card">
               <div class="card-header">
                 <span>Modificar producto</span>
               </div>
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-8 col-sm-12 col-md-8">
                     <label for="nombre">Nombre</label>
                     <input class="form-control" type="text" name="nombre" id="nombre" value="{{$Producto->nom_producto}}">
                     <label for="precio_venta">Precio de venta</label>

                     <input class="form-control" type="text" name="precio_venta" id="precio_venta" value="{{$Producto->precio_venta}}">
                     <label for="tipo_producto">Tipo del producto</label>
                     <select class="form-control" name="tipo_de_producto" id="tipo_de_producto">
                       @foreach ($TipoProductos as $TipoProducto)
                         @if($TipoProducto->cod_tipo_producto == $Producto->cod_tipo_producto)
                           <option selected="true" value="{{$TipoProducto->cod_tipo_producto}}">{{$TipoProducto->nombre}}</option>
                         @else
                           <option value="{{$TipoProducto->cod_tipo_producto}}">{{$TipoProducto->nombre}}</option>
                         @endif
                       @endforeach
                     </select>
                     <label for="marca">Marca</label>
                     <select class="form-control" name="marca" id='marca'>
                       @foreach ($Marcas as $Marca)
                         @if($Marca->cod_marca == $Producto->cod_marca)
                           <option selected="true" value="{{$Marca->cod_marca}}">{{$Marca->nombre}}</option>
                         @else
                           <option value="{{$Marca->cod_marca}}">{{$Marca->nombre}}</option>
                         @endif
                       @endforeach
                     </select>
                   </div>
                   <div class="col-lg col-sm col-md">
                     <div class="input-group mb-3 mt-4">
                       <div class="custom-file">
                         <input type="file" class="custom-file-input" name="foto_producto" id="foto_producto">
                         <label class="custom-file-label" for="foto_producto" id="lblfile">Eliga una imagen</label>
                       </div>
                     </div>
                     <div class="card mt-4">
                       <div class="card-header">
                         <span>Foto del producto</span>
                       </div>
                       <div class="card-body" id="imagePreview">
                       </div>
                     </div>
                   </div>
                 </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary float-left" type="submit">Modificar</button>
                  <a class="btn btn-primary float-right" href="{{ route('producto.index') }}">Volver</a>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
  </section>
@endsection
@section('script')
  <script type="text/javascript">
  (function(){
      function filePreview(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();

          reader.onload = function(e){
            $('#imagePreview').html("<img id='img1' class='img-fluid'src='"+e.target.result+"'>");
            document.getElementById('lblfile').innerText = document.getElementById('foto_producto').files[0].name;;
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      $('#foto_producto').change(function(){
        filePreview(this);
      });

      $('#foto_producto').click(function(){
        imagen = document.getElementById('img1');
        	if (imagen){
        		padre = imagen.parentNode;
        		padre.removeChild(imagen);
            document.getElementById('lblfile').innerText = 'Eliga una imagen';
          }
      });

    })();
  </script>
@endsection