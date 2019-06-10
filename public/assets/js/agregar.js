
$(function(){
    //agregar accion a los botones para agregar goles
    $('#agoleslocal').on('click', agoleslocal);
    $('#agolesvisitante').on('click', agolesvisitante);
    //accion para el boton de resgistro de goles
    //$('#rtgoles').on('click', cuentaGoles);
    //agregar accion a los botones para agregar titulares
    $('#atitulareslocal').on('click', atitulareslocal);
    $('#atitularesvisitante').on('click', atitularesvisitante);
    //agregar accion a los botones para agregar suplentes
    $('#asuplenteslocal').on('click', asuplenteslocal);
    $('#asuplentesvisitante').on('click', asuplentesvisitante);
    //agregar accion a los botones para agregar cambios
    $('#acambioslocal').on('click', acambioslocal);
    $('#acambiosvisitante').on('click', acambiosvisitante);
    //agregar accion a los botones para agregar tatjetas
    $('#atarjetaslocal').on('click', atarjetaslocal);
    $('#atarjetasvisit').on('click', atarjetasvisitante);
    //agregar accion para los botones que eliminan
    $(document).on('click', '.btn-danger', eliminaelemento);
});

//Funcion para eliminar la tarjeta
function eliminaelemento(){
    $(this).parent().remove();
}

var cgl=0, cgv=0, cjtl=0, cjtv=0, cjsl=0, cjsv=0, ctl=0, ctv=0, ccl=0, ccv=0;//variables contadoras para llevar el control de los id´s de los select

//Funciones para agregar el codigo de insertar goles
function agoleslocal(){
    var agolesl = $('#plantillagoles').html();
    
    $('#goleslocal').append(agolesl); 
    
    cgl+=1;
    $('#goljugador').attr("id","goljugadorl"+cgl);
    $('#goljugadorl'+cgl).attr("name","id_jugadorl[]");
    $('#eoculto').attr("id","eocultol"+cgl);//para contar goles
    $('#eocultol'+cgl).attr("name","equipoglt[]");
    $('#golminuto').attr("id","golminutol"+cgl);
    $('#golminutol'+cgl).attr("name","minutol[]");
    
    //se extrae el valor de la variable que contiene el id del equipo local en este caso
    //esta variable esta en el archivo goles.blade.php
    var elocal = document.getElementById("idlocal").value;
    //console.log(elocal);

    //este fukin metodo lista los fukin nombres
    $.get('registro2/'+elocal+'',function(datos){
        //console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            //console.log(datos[i].id_jugador);
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#goljugadorl'+cgl).html(lista);
    });
}


//funcionamiento similar al metodo anterios y basicamente a los demas
function agolesvisitante(){
    var agolesl = $('#plantillagoles').html();
    $('#golesvisitante').append(agolesl);

    cgv+=1;
    $('#goljugador').attr("id","goljugadorv"+cgv);
    $('#goljugadorv'+cgl).attr("name","id_jugadorv[]");
    $('#eoculto').attr("id","eocultov"+cgv);
    $('#eocultov'+cgv).attr("name","equipogvt[]");
    $('#golminuto').attr("id","golminutov"+cgl);
    $('#golminutov'+cgl).attr("name","minutov[]");

    var evisit = document.getElementById("idvisit").value;
    //console.log(evisit);

    $.get('registro2/'+evisit+'',function(datos){
        //console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#goljugadorv'+cgv).html(lista);
    });
}

/*function cuentaGoles(){
    var elg = document.getElementsByName("equipoglt[]").length;
    var evg = document.getElementsByName("equipogvt[]").length;

    console.log(elg);
    console.log(evg);

    //var marcalo='<input type="text" id="totlocal" readonly style="max-width: 60px" value="'+elg+'"></input>'
    //var marcavi='<input type="text" id="totvisitante" readonly readonly style="max-width: 60px" value="'+evg+'"></input>'

    var brg = document.getElementById("rtgoles");
    brg.disabled = true;

    $('#marcadorlocal').append(elg);
    $('#marcadorvisitante').append(evg);
}*/

//Funciones para agregar el codigo de insertar titulares
function atitulareslocal(){
    var titulares = $('#plantillatitulares').html();
    $('#titulareslocal').append(titulares);

    cjtl+=1;
    $('#jugadortit').attr("id","jugadortitl"+cjtl);
    $('#jugadortitl'+cjtl).attr("name","id_jugadorl[]");
    /*$('#id_partido').attr("id","id_partidol"+cjtl);
    $('#id_partidol'+cjtl).attr("name","id_partidol[]");*/

    var elocal = document.getElementById("idlocal").value;
    //console.log(elocal);

    $.get('registro2/'+elocal+'',function(datos){
        //console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#jugadortitl'+cjtl).html(lista);
    });
}


function atitularesvisitante(){
    var titulares = $('#plantillatitulares').html();
    $('#titularesvisitante').append(titulares);

    cjtv+=1;
    $('#jugadortit').attr("id","jugadortitv"+cjtv);
    $('#jugadortitv'+cjtv).attr("name","id_jugadorv[]");
    /*$('#id_partido').attr("id","id_partidov"+cjtv);
    $('#id_partidov'+cjtv).attr("name","id_partidov[]");*/

    var evisit = document.getElementById("idvisit").value;
    //console.log(evisit);

    $.get('registro2/'+evisit+'',function(datos){
        //console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#jugadortitv'+cjtv).html(lista);
    });
}

//Funciones para agregar el codigo de insertar suplentes
function asuplenteslocal(){
    var suplentes = $('#plantillasuplentes').html();
    $('#suplenteslocal').append(suplentes);

    cjsl+=1;
    $('#jugadorsup').attr("id","jugadorsupl"+cjsl);
    $('#jugadorsupl'+cjsl).attr("name","id_jugadorl[]");
    /*$('#id_partido').attr("id","id_partidol"+cjsl);
    $('#id_partidol'+cjsl).attr("name","id_partidol[]");*/

    var elocal = document.getElementById("idlocal").value;
    console.log(elocal);

    $.get('registro2/'+elocal+'',function(datos){
        console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#jugadorsupl'+cjsl).html(lista);
    });
}
function asuplentesvisitante(){
    var suplentes = $('#plantillasuplentes').html();
    $('#suplentesvisitante').append(suplentes);

    cjsv+=1;
    $('#jugadorsup').attr("id","jugadorsupv"+cjsv);
    $('#jugadorsupv'+cjsv).attr("name","id_jugadorv[]");
    /*$('#id_partido').attr("id","id_partidol"+cjsv);
    $('#id_partidol'+cjsv).attr("name","id_partidol[]");*/

    var evisit = document.getElementById("idvisit").value;
    console.log(evisit);

    $.get('registro2/'+evisit+'',function(datos){
        console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#jugadorsupv'+cjsv).html(lista);
    });
}


/////////////////////////
//Funciones para agregar el codigo de insertar cambios
function acambioslocal(){
    var cambio = $('#plantillacambios').html();
    $('#cambioslocal').append(cambio);

    ccl+=1;
    $('#jugadore').attr("id","jugadorel"+ccl);
    $('#jugadorel'+ccl).attr("name","id_jugadorel[]");
    $('#jugadors').attr("id","jugadorsl"+ccl);
    $('#jugadorsl'+ccl).attr("name","id_jugadorsl[]");
    $('#golminuto').attr("id","golminutol"+ccl);
    $('#golminutol'+ccl).attr("name","minutol[]");
    /*$('#id_partido').attr("id","id_partidol"+cjsl);
    $('#id_partidol'+cjsl).attr("name","id_partidol[]");*/

    var elocal = document.getElementById("idlocal").value;
    console.log(elocal);

    $.get('registro2/'+elocal+'',function(datos){
        console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#jugadorel'+ccl).html(lista);
        $('#jugadorsl'+ccl).html(lista);
    });
}
function acambiosvisitante(){
    var cambio = $('#plantillacambios').html();
    $('#cambiosvisitante').append(cambio);

    ccv+=1;
    $('#jugadore').attr("id","jugadorev"+ccv);
    $('#jugadorev'+ccv).attr("name","id_jugadorev[]");
    $('#jugadors').attr("id","jugadorsv"+ccv);
    $('#jugadorsv'+ccv).attr("name","id_jugadorsv[]");
    $('#golminuto').attr("id","golminutov"+ccl);
    $('#golminutov'+ccl).attr("name","minutov[]");
    /*$('#id_partido').attr("id","id_partidol"+cjsv);
    $('#id_partidol'+cjsv).attr("name","id_partidol[]");*/

    var evisit = document.getElementById("idvisit").value;
    console.log(evisit);

    $.get('registro2/'+evisit+'',function(datos){
        console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'
        }
        $('#jugadorev'+ccv).html(lista);
        $('#jugadorsv'+ccv).html(lista);
    });
}



//Funciones para agregar el codigo de insertar tarjetas
function atarjetaslocal(){
    var tarjetas = $('#plantillatarjetas').html();
    $('#tarjetaslocal').append(tarjetas);

    ctl+=1;
    $('#jfalta').attr("id","jfaltal"+ctl);
    $('#jfaltal'+ctl).attr("name","id_jugadorl[]");
    $('#golminuto').attr("id","golminutol"+ctl);
    $('#golminutol'+ctl).attr("name","minutol[]");
    $('#tfalta').attr("id","tfaltal"+ctl);
    $('#tfaltal'+ctl).attr("name","tfaltal[]");

    var elocal = document.getElementById("idlocal").value;
    console.log(elocal);

    $.get('registro2/'+elocal+'',function(datos){
        console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'
        }
        $('#jfaltal'+ctl).html(lista);
    });
}
function atarjetasvisitante(){
    var tarjetas = $('#plantillatarjetas').html();
    $('#tarjetasvisitantes').append(tarjetas);

    ctv+=1;
    $('#jfalta').attr("id","jfaltav"+ctv);
    $('#jfaltav'+ctv).attr("name","id_jugadorv[]");
    $('#golminuto').attr("id","golminutov"+ctv);
    $('#golminutov'+ctv).attr("name","minutov[]");
    $('#tfalta').attr("id","tfaltav"+ctv);
    $('#tfaltav'+ctv).attr("name","tfaltav[]");

    var evisit = document.getElementById("idvisit").value;
    console.log(evisit);

    $.get('registro2/'+evisit+'',function(datos){
        console.log("entro");
        var lista='<opcion value="">Seleccione</option>';
        for(var i=0; i<datos.length; i++)
        {
            lista+='<option value="'+datos[i].id_jugador+'">'+datos[i].nombre+' '+datos[i].apellido_p+' '+datos[i].apellido_m+'</option>'            
        }
        $('#jfaltav'+ctv).html(lista);
    });
}