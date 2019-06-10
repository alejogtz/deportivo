
var table_pertenece = $('#table-pertence').DataTable({
    "ajax": '../jugador_equipo/en_equipo_json/0',
    "columns": [
        {data: 'id_jugador'},
        {data: 'nombre'},
        {data: 'no_playera'},
        {data: 'estatura'},
        {data: 'posicion'},
        {data: 'sexo'},
        {data: 'edad'},
        {data: 'action'}
    ],
    "language": {
        "info": "_TOTAL_ registros",
        "search": "Buscar",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior",
        },
        "lengthMenu": 'Mostrar <select >'+
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="100">100</option>'+
                    '<option value="-1">Todos</option>'+
                    '</select> registros',
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "emptyTable": "No hay datos",
        "zeroRecords": "No hay coincidencias", 
        "infoEmpty": "",
        "infoFiltered": ""
    }
});

var table_no_pertenece = $('#table-no-pertence').DataTable({
    "ajax": '../jugador_equipo/no_en_equipo_json/0',
    "columns": [
        {data: 'id_jugador'},
        {data: 'nombre'},
        {data: 'no_playera'},
        {data: 'estatura'},
        {data: 'posicion'},
        {data: 'sexo'},
        {data: 'edad'},
        {data: 'action'}
    ],
    "language": {
        "info": "_TOTAL_ registros",
        "search": "Buscar",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior",
        },
        "lengthMenu": 'Mostrar <select >'+
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="100">100</option>'+
                    '<option value="-1">Todos</option>'+
                    '</select> registros',
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "emptyTable": "No hay datos",
        "zeroRecords": "No hay coincidencias", 
        "infoEmpty": "",
        "infoFiltered": ""
    }
});


$(document).ready(function(){
    $equipo = document.getElementById("equipo_selected");
    if($equipo.value != 'Seleciona un equipo'){
        table_pertenece.ajax.url('../jugador_equipo/en_equipo_json/'+$equipo.value).load();
        table_no_pertenece.ajax.url('../jugador_equipo/no_en_equipo_json/'+$equipo.value).load();
    }else{
        table_pertenece;
        table_no_pertenece;
    }
});



function equipoSelecionado(){
    $equipo = document.getElementById("equipo_selected");
    document.getElementById("nombre_equipo").innerHTML = $equipo.options[$equipo.selectedIndex].innerHTML;
    table_pertenece.ajax.url('../jugador_equipo/en_equipo_json/'+$equipo.value).load();
    table_no_pertenece.ajax.url('../jugador_equipo/no_en_equipo_json/'+$equipo.value).load();    
}
