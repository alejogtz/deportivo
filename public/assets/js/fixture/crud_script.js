function deleteDirector(id) {
    document.getElementById("id_director_d").value = id.id_director;
}

function editDirector(id) {
    document.getElementById("id_director_e").value = id.id_director;
    document.getElementById("nombre_e").value = id.nombre;
    document.getElementById("apellido_p_e").value = id.apellido_p;
    document.getElementById("apellido_m_e").value = id.apellido_m;

    let $eliminado = document.getElementById("eliminado_e");
    var options = '';
    if (id.eliminado) {
        options += '<option value="' + 'true' + '" selected>NO</option>';
        options += '<option value="' + 'false' + '" >SI</option>';
    } else {
        options += '<option value="' + 'false' + '" selected>SI</option>';
        options += '<option value="' + 'true' + '" >NO</option>';
    }
    $eliminado.innerHTML = options;
}

function deleteJugador(id) {
    document.getElementById("id_jugador").value = id.id_jugador;
}

function editJugador(id) {
    console.log(id);
    document.getElementById("id_jugador_edit").value = id.id_jugador;
    document.getElementById("nombre").value = id.nombre;
    document.getElementById("apellido_p").value = id.apellido_p;
    document.getElementById("apellido_m").value = id.apellido_m;
    document.getElementById("no_playera").value = id.no_playera;
    document.getElementById("estatura").value = id.estatura;
    document.getElementById("fecha_nac").value = id.fecha_nac;

    let $posicion = document.getElementById("posicion");
    var options_pos = '';
    var posiciones = ['Delantero', 'Medio', 'Defensa', 'Portero'];
    for (var i = 0; i < posiciones.length; i++) {
        if (posiciones[i] == id.posicion)
            options_pos += '<option value="' + posiciones[i] + '" selected>' + posiciones[i] + '</option>';
        else
            options_pos += '<option value="' + posiciones[i] + '">' + posiciones[i] + '</option>';
    }
    $posicion.innerHTML = options_pos;

    let $eliminado = document.getElementById("eliminado");
    var options = '';
    if (id.eliminado) {
        options += '<option value="' + 'true' + '" selected>NO</option>';
        options += '<option value="' + 'false' + '" >SI</option>';
    } else {
        options += '<option value="' + 'false' + '" selected>SI</option>';
        options += '<option value="' + 'true' + '" >NO</option>';
    }
    $eliminado.innerHTML = options;

    var options = '';
    let $sexo = document.getElementById("sexo");
    if (id.sexo == 'M') {
        options += '<option value="' + 'M' + '" selected>Mujer</option>';
        options += '<option value="' + 'H' + '" >Hombre</option>';
    } else {
        options += '<option value="' + 'H' + '" selected>Hombre</option>';
        options += '<option value="' + 'M' + '" >Mujer</option>';
    }
    $sexo.innerHTML = options;

    console.log();
    if (id.foto == "") {
        console.log('Foto nula');
        document.getElementById("imagen_jugador").src = '../assets/images_jugador/user_default.png'
    } else {
        console.log('Foto ' + id.foto);
        document.getElementById("imagen_jugador").src = '../assets/images_jugador/' + id.foto;;
    }
}

function verFoto(id) {
    if (id.foto != null) {
        document.getElementById("ver_imagen").src = '../assets/images_jugador/' + id.foto;
    } else {
        document.getElementById("ver_imagen").src = '../assets/images_jugador/user_defaul.png';
    }
}

function deleteEquipo(id) {
    document.getElementById("id_equipo_d").value = id.id_equipo;
}

function editEquipo(id) {
    document.getElementById("id_equipo_e").value = id.id_equipo;
    document.getElementById("nombre_e").value = id.nombre;
    document.getElementById("fecha_inscripcion_e").value = id.fecha_inscripcion;
    document.getElementById("lugar_procedencia_e").value = id.lugar_procedencia;

    let $eliminado = document.getElementById("eliminado_e");
    var options = '';
    if (id.eliminado) {
        options += '<option value="' + 'true' + '" selected>NO</option>';
        options += '<option value="' + 'false' + '" >SI</option>';
    } else {
        options += '<option value="' + 'false' + '" selected>SI</option>';
        options += '<option value="' + 'true' + '" >NO</option>';
    }
    $eliminado.innerHTML = options;

    $.get('../director/allDispobible',function (data){
        let $directores = document.getElementById("id_director_e");
        var options_d = '';
        for(var i=0; i<data.length; i++){
            if(id.id_director.id_director == data[i].id_director){
                options_d += '<option value="' + data[i].id_director + '" selected>'+ (data[i].nombre + ' ' +data[i].apellido_p +' '+data[i].apellido_m) +'</option>';
            }
            else{
                options_d += '<option value="' + data[i].id_director + '">'+data[i].nombre + ' ' +data[i].apellido_p +' '+data[i].apellido_m +'</option>';
            }
        }
        $directores.innerHTML = options_d;
    });

    var $options = document.getElementById('categoria_e').options;
    var opt = -1;
    for (let i = 0; i < $options.length; i++) {
        if($options[i].value == id.categoria){
            //console.log($options[i].value + "   " + id.categoria)
            opt = i;
            break;
        }       
    }
    document.getElementById('categoria_e').selectedIndex = opt;
    
}

function agregaEquipo(){
    $.get('../director/allDispobible',function (data){
        let $directores = document.getElementById("id_director_a");
        var options_d = '<option disabled selected>Selecciona...</option>';
        for(var i=0; i<data.length; i++){
            options_d += '<option value="' + data[i].id_director + '">'+data[i].nombre + ' ' +data[i].apellido_p +' '+data[i].apellido_m +'</option>';
        }
        $directores.innerHTML = options_d;
    });
}

function deleteTorneo(id) {
    document.getElementById("id_torneo_d").value = id.id_torneo;
}

function editTorneo(id) {
    document.getElementById("id_torneo_e").value = id.id_torneo;
    document.getElementById("nombre_e").value = id.nombre;
    document.getElementById("fecha_inaguracion_e").value = id.fecha_inaguracion;
    document.getElementById("fecha_termino_e").value = id.fecha_termino;

    let $eliminado = document.getElementById("eliminado");
    var options = '';
    if (id.eliminado) {
        options += '<option value="' + 'true' + '" selected>NO</option>';
        options += '<option value="' + 'false' + '" >SI</option>';
    } else {
        options += '<option value="' + 'false' + '" selected>SI</option>';
        options += '<option value="' + 'true' + '" >NO</option>';
    }
    $eliminado.innerHTML = options;

    var $options = document.getElementById('categoria_e').options;
    var opt = -1;
    for (let i = 0; i < $options.length; i++) {
        if($options[i].value == id.categoria){
            opt = i;
            break;
        }       
    }
    document.getElementById('categoria_e').selectedIndex = opt;
    
}

function deleteDeEquipo(data,equipo){
    console.log("equipo:" + equipo +" jugado: " + data);
    document.getElementById("id_jugador_d").value = data;
    document.getElementById("id_equipo_d").value = equipo;
}

function agregarAlEquipo(data,equipo){
    console.log("equipo: "+equipo +" jugado: " + data);
    document.getElementById("id_jugador_a").value = data;
    document.getElementById("id_equipo_a").value = equipo;
}


window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);


$(document).ready(function() {
    $('#table').DataTable({
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
});
