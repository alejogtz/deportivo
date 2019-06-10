//en este documento se mandara la informacion de los formularios
$(function(){
    //agregar accion a los botones para agregar goles
    $('#rtgoles').on('click', preguntaenviogoles);
    $('#rtitulares').on('click', preguntaenviotitulares);
    $('#rsuplentes').on('click', preguntaenviosuplentes);
    $('#rcambios').on('click', preguntaenviocambios);
    $('#rttarjetas').on('click', preguntaenviotarjetas);
});

function preguntaenviogoles(){
    var confirmagoles = confirm("¿Seguro que quieres registrar los goles?");
    if(confirmagoles)
    {
        $.ajax({
            type: "POST",
            url: "insertargl",
            data: $('#golesform').serialize(),
            success: function(res){}
        });

        var elg = document.getElementsByName("equipoglt[]").length;
        var evg = document.getElementsByName("equipogvt[]").length;

        var brg = document.getElementById("rtgoles"); 
        var bagl = document.getElementById("agoleslocal");
        var bagv = document.getElementById("agolesvisitante");  
        brg.disabled = true;
        bagl.disabled = true;
        bagv.disabled = true;

        $('#marcadorlocal').append(elg);
        $('#marcadorvisitante').append(evg);
    }
}

/*function enviogoles()
{
    $.ajax({
        type: "POST",
        url: "insertargl",
        data: $('#golesform').serialize(),
        success: function(res){}
    });
}*/

function preguntaenviotitulares()
{
    var confirmatitulares = confirm("¿Seguro que quieres registrar a los titulares?");

    if(confirmatitulares)
    {
        $.ajax({
            type: "POST",
            url: "insertartit",
            data: $('#titularesform').serialize(),
            success: function(res){
                //console.log(res);
            }
        });

        var brt = document.getElementById("rtitulares"); 
        var batl = document.getElementById("atitulareslocal");
        var batv = document.getElementById("atitularesvisitante");  
        brt.disabled = true;
        batl.disabled = true;
        batv.disabled = true;

    }
    
}

function preguntaenviosuplentes()
{
    var confirmasuplentes = confirm("¿Seguro que quieres registrar a los suplentes?");

    if(confirmasuplentes)
    {
        $.ajax({
            type: "POST",
            url: "insertarsup",
            data: $('#suplentesform').serialize(),
            success: function(res){
                //console.log(res);
            }
        });

        var brt = document.getElementById("rsuplentes"); 
        var batl = document.getElementById("asuplenteslocal");
        var batv = document.getElementById("asuplentesvisitante");  
        brt.disabled = true;
        batl.disabled = true;
        batv.disabled = true;

    }

}

function preguntaenviocambios()
{
    var confirmacambios = confirm("¿Seguro que quieres registrar a los cambios?");

    if(confirmacambios)
    {
        $.ajax({
            type: "POST",
            url: "insertarcam",
            data: $('#cambiosform').serialize(),
            success: function(res){
                //console.log(res);
            }
        });

        var brt = document.getElementById("rcambios"); 
        var batl = document.getElementById("acambioslocal");
        var batv = document.getElementById("acambiosvisitante");  
        brt.disabled = true;
        batl.disabled = true;
        batv.disabled = true;

    }

}

function preguntaenviotarjetas()
{
    var confirmatarjetas = confirm("¿Seguro que quieres registrar las tarjetas?");

    if(confirmatarjetas)
    {
        $.ajax({
            type: "POST",
            url: "insertatar",
            data: $('#tarjetasform').serialize(),
            success: function(res){
                //console.log(res);
            }
        });

        var brt = document.getElementById("rttarjetas"); 
        var batl = document.getElementById("atarjetaslocal");
        var batv = document.getElementById("atarjetasvisit");  
        brt.disabled = true;
        batl.disabled = true;
        batv.disabled = true;

    }

    
}

