@extends('Layouts.adminLayout')
@section('title',' - Crear producto')
@section('content')
  <section class="container-fluid pt-4">
    <div class="row">
        <div id='registrar_producto' class="col-lg-10 col-sm-12 col-md-10 mx-auto">
          @include('Common.errorProducto')
          @include('Producto.Forms.createForm')
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
