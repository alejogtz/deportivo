$(function () {

    $('#select-torneo').on('change', metodo_listar);
 
 });

function metodo_listar()
{
    var genero = document.getElementById("select-torneo").value;
    $('#sel1').html("torneo"+genero);
   /* $.get('lista_alumnos/'+genero+'', function (data){
        var html_select = '<option value="">SELECCIONE</option>';
        for (var i = 0; i < data.length; i++)
          html_select += '<option value="'+data[i].id+'">'+data[i].nombre_completo+'</option>'
   
          $('#select-genero2').html(html_select);
   
      });*/
}
