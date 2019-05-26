function editDirector(id) {
    console.log(id)
    document.getElementById("id_director").value = id.id_director;
    document.getElementById("nombre").value = id.nombre;
    document.getElementById("apellido_p").value = id.apellido_p;
    document.getElementById("apellido_m").value = id.apellido_m;
    let $select = document.getElementById("eliminado");
    var options = '';
    if (id.eliminado) {
        options += '<option selected>SI</option>';
        options += '<option>NO</option>';
    } else {
        options += '<option selected>NO</option>';
        options += '<option>SI</option>';
    }
    $select.innerHTML = options;
}