$(document).ready(function(){

    $('#cod_producto').ready(function (){
      var codProducto = $('#cod_producto').val();
      $.ajax({
        type: 'get',
        url:"http://genericlothing.site/ajax-PecioProductoFind",
        data: {
          "codProducto": codProducto,
        },
        dataType: 'text',
        success: function(data){
          console.log(data);
          $('#divPrecioCompra').html(data);
        }
      });
    });

    $('#cod_producto').on('change',function (){
      var codProducto = $('#cod_producto').val();
      $.ajax({
        type: 'get',
        url:"http://genericlothing.site/ajax-PecioProductoFind",
        data: {
          "codProducto": codProducto,
        },
        dataType: 'text',
        success: function(data){
          console.log(data);
          $('#divPrecioCompra').html(data);
        }
      });
    });

  });
