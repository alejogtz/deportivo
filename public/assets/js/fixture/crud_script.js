function editDirector(id) {
    document.getElementById("id_director").value = id.id_director;
    document.getElementById("nombre").value = id.nombre;
    document.getElementById("apellido_p").value = id.apellido_p;
    document.getElementById("apellido_m").value = id.apellido_m;
    let $select = document.getElementById("eliminado");
    var options = '';
    if (id.eliminado) {
        options += '<option value="' + 'true' + '" selected>SI</option>';
        options += '<option value="' + 'false' + '" >NO</option>';
    } else {
        options += '<option value="' + 'false' + '" selected>NO</option>';
        options += '<option value="' + 'true' + '" >SI</option>';
    }
    $select.innerHTML = options;
}

function deleteDirector(id) {
    document.getElementById("id_director").value = id.id_director;
}