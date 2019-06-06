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
    document.getElementById("categoria_e").value = id.categoria;
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
}


/** 
    <th scope="col">ID</th>
    <th scope="col">Nombre Completo</th>
    <th scope="col">No Playera</th>
    <th scope="col">Estatura</th>
    <th scope="col">Posición</th>
    <th scope="col">Sexo</th>
    <th scope="col">Edad</th>
    <th scope="col">Acción</th>
    <td>
        <a onclick="deleteDeEquipo(data[i].id_jugador,data[i].id_equipo)" href="#deleteDeEquipo" class="delete" data-toggle="modal">
            <i class="material-icons" data-toggle="tooltip" title="Edit">remove_circle</i>
        </a>
    </td>
    <a onclick = "deleteTorneo({{ $d }})" href="#deleteTorneoModal" class="delete" data-toggle="modal">
            <i class="material-icons" data-toggle="tooltip" title="Delete">check_circle</i>
        </a>
**/

function equipoSelecionado(){
    $equipo = document.getElementById("equipo_selected");
    document.getElementById("nombre_equipo").innerHTML = $equipo.options[$equipo.selectedIndex].innerHTML;
    $.get('../jugador_equipo/en_equipo/'+$equipo.value,function (data){
        let $tabla1 = document.getElementById("equipo_pertenece");
        var rows = '';
        for(var i=0; i<data.length; i++){
            rows += '<tr>';
                rows += '<td>'+data[i].id_jugador+'</td>';
                rows += '<td>'+data[i].nombre+ ' '+data[i].apellido_p+' '+data[i].apellido_m+'</td>';
                rows += '<td>'+data[i].no_playera+'</td>';
                rows += '<td>'+data[i].estatura+'</td>';
                rows += '<td>'+data[i].posicion+'</td>';
                rows += '<td>'+data[i].sexo+'</td>';
                rows += '<td>'+data[i].edad+'</td>';
                rows += '<td>';
                    rows += '<a onclick="deleteDeEquipo('+data[i].id_jugador+','+$equipo.value+')'+'" href="#deleteDeEquipo" class="delete" data-toggle="modal">';
                        rows += '<i class="material-icons text-danger" data-toggle="tooltip" title="Remover">remove_circle</i>';
                    rows += '</a>';
                rows +='</td>';
            rows += '</tr>';
        }
        $tabla1.innerHTML = rows;
    });

    $.get('../jugador_equipo/no_en_equipo/'+$equipo.value,function (data){
        let $tabla1 = document.getElementById("equipo_no_pertenece");
        var rows = '';
        for(var i=0; i<data.length; i++){
            rows += '<tr>';
                rows += '<td>'+data[i].id_jugador+'</td>';
                rows += '<td>'+data[i].nombre+ ' '+data[i].apellido_p+' '+data[i].apellido_m+'</td>';
                rows += '<td>'+data[i].no_playera+'</td>';
                rows += '<td>'+data[i].estatura+'</td>';
                rows += '<td>'+data[i].posicion+'</td>';
                rows += '<td>'+data[i].sexo+'</td>';
                rows += '<td>'+data[i].edad+'</td>';
                rows += '<td>';
                    rows += '<a onclick="agregarAlEquipo('+data[i].id_jugador+','+$equipo.value+')'+'" href="#agregarAlEquipo" class="delete" data-toggle="modal">';
                        rows += '<i class="material-icons text-success" data-toggle="tooltip" title="Agregar">add_circle</i>';
                    rows += '</a>';
                rows +='</td>';
            rows += '</tr>';
        }
        $tabla1.innerHTML = rows;
    });
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