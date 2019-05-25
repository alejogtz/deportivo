$(function(){
    //agregar accion a los botones para agregar goles
    $('#agoleslocal').on('click', agoleslocal);
    $('#agolesvisitante').on('click', agolesvisitante);
    //agregar accion a los botones para agregar titulares
    $('#atitulareslocal').on('click', atitulareslocal);
    $('#atitularesvisitante').on('click', atitularesvisitante);
    //agregar accion a los botones para agregar suplentes
    $('#asuplenteslocal').on('click', asuplenteslocal);
    $('#asuplentesvisitante').on('click', asuplentesvisitante);
    //agregar accion para los botones que eliminan
    $(document).on('click', '.btn-danger', eliminaelemento);
});

//Funcion para eliminar la tarjeta
function eliminaelemento(){
    $(this).parent().remove();
}

//Funciones para agregar el codigo de insertar goles
function agoleslocal(){
    var agolesl = $('#plantillagoles').html();
    $('#goleslocal').append(agolesl);
}
function agolesvisitante(){
    var agolesl = $('#plantillagoles').html();
    $('#golesvisitante').append(agolesl);
}

//Funciones para agregar el codigo de insertar titulares
function atitulareslocal(){
    var titulares = $('#plantillatitulares').html();
    $('#titulareslocal').append(titulares);
}
function atitularesvisitante(){
    var titulares = $('#plantillatitulares').html();
    $('#titularesvisitante').append(titulares);
}

//Funciones para agregar el codigo de insertar suplentes
function asuplenteslocal(){
    var suplentes = $('#plantillasuplentes').html();
    $('#suplenteslocal').append(suplentes);
}
function asuplentesvisitante(){
    var suplentes = $('#plantillasuplentes').html();
    $('#suplentesvisitante').append(suplentes);
}