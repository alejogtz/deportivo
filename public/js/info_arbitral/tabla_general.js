$(function () {

    $('#select-torneo').on('change', metodo_listar);
 
 });

function metodo_listar()
{
    var id_t = document.getElementById("select-torneo").value;
    $('#sel1').html("torneo"+id_t);
    $.get('tabla_x_torneo/'+id_t+'', function (data){
        var html_select = '<tr> ';
        for (var i = 0; i < data.length; i++){
        html_select += '<tr>';
        html_select += '<th>'+(i+1)+'</th>';
        html_select += '<td>'+data[i].equipo+'</td>';
        html_select += '<td>'+data[i].pts+'</td>';
        html_select += '<td>'+data[i].pj+'</td>';
        html_select += '<td>'+data[i].v+'</td>';
        html_select += '<td>'+data[i].e+'</td>';
        html_select += '<td>'+data[i].d+'</td>';
        html_select += '<td>'+data[i].gf+'</td>';
        html_select += '<td>'+data[i].gc+'</td>';
        html_select += '<td>'+data[i].dif+'</td>';
        html_select += '</tr>';
    }
   
          $('#tabla').html(html_select);
   
      });
}
