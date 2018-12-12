$(document).ready(function(){

    $('#cod_tienda').ready(function (){
      var ctienda = $("#cod_tienda").val();
      $.ajax({
        type: 'get',
        url:"http://genericlothing.site/ajax-BodegasFind" ,
        data: {
          "ctienda": ctienda,
        },
        dataType: 'text',
        success: function(data){
          console.log(data);
          $('#direccion_bodega').html(data);
        }
      });
    });

    $('#cod_tienda').on('change',function (){
      var ctienda = $("#cod_tienda").val();
      $.ajax({
        type: 'get',
        url:"http://genericlothing.site/ajax-BodegasFind" ,
        data: {
          "ctienda": ctienda,
        },
        dataType: 'text',
        success: function(data){
          console.log(data);
          $('#direccion_bodega').html(data);
        }
      });
    });

  });
