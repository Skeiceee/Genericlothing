$(document).ready(function(){

    $('#num-items').ready(function (){
      var ctienda = $("#cod_tienda").val();
      $.ajax({
        type: 'get',
        url:"http://genericlothing.site/ajax-UpdateCarro" ,
        dataType: 'text',
        success: function(data){
          console.log(data);
          $('#num-items').html(data);
        }
      });
    });

  });
