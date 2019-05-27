$(function () {

    $('#select-torneo').on('change', metodo_listar);
 
 });

function metodo_listar()
{
    var id_t = document.getElementById("select-torneo").value;
    $('#sel1').html("torneo"+id_t);
    $.get('tabla_x_torneo/'+id_t+'', function (data){
        var html_select = '';
        for (var i = 0; i < data.length; i++)
          html_select += '<p>'+data[i].tabla_general+'</p>';
   
          $('#prueba').html(html_select);
   
      });
}
