$(function(){
    //$('#select-categoria').on('change',metodo_listar_categoria);
});

$(function(){
    $('#select-torneos').append(getData);
});

//CARGAR TORNEOS
var id;
var nombre_torneo;
var no_equipos;
function getData(){
    $.get('listado_torneos',function(data){
        var html_select = '<option disabled selected>SELECCIONE UN TORNEO</option>';
        for(var i =0; i<data.length;i++){
            html_select+='<option id="'+data[i].id_torneo+'" value="'+data[i].categoria+'">'+data[i].nombre+' '+data[i].categoria+'</option>'
        }
        $('#select-torneos').html(html_select);        
    });
    $('#select-torneos').on('change',function(){
        //console.log("");
        var equipo = document.getElementById("select-torneos").value;
        id = $(this).children(":selected").attr("id");
        nombre_torneo = $("#select-torneos option:selected").text();
        console.log("ID_TORNEO: ",id, ' '+nombre_torneo);
        $.get('listado_equipos/'+equipo,function(data){
            var html_select = '';
            no_equipos = data;
            for (var i = 0; i < data.length; i++){
                    html_select += '<div class="col-md-4 mb-3">'
                    +'<div class="card" style="width: 15rem;">'
                    +'<div class="card-body">'
                    +'<h5 class="card-title">Nombre: '+data[i].nombre+'</h5> '
                    +'<p class="texto_tarjetas" >ID Equipo: '+data[i].id_equipo+'</p> '
                    +'<p class="texto_tarjetas">Categoria: '+data[i].categoria+'</p> '
                    +'<p class="texto_tarjetas">Lugar Procedencia: '+data[i].lugar_procedencia+'</p>'
                    +'<div class="element" id="div_1">'
                    +'<input type="button"  onclick="addTeam(this)" id="'+data[i].id_equipo+'" value="Añadir Equipo" class="btn btn-primary" />'
                    +'</div>'
                    +'</div>'
                    +'</div>'
                    +'</div>'
            }
            $('#select-equipos').html(html_select);
            });
    });
}

/*function metodo_listar_categoria(){
    var equipo = document.getElementById("select-categoria").value;
    $.get('listado_equipos/'+equipo+'',function(data){
    var html_select = '';
    for (var i = 0; i < data.length; i++){
            html_select += '<div class="col-md-4 mb-3">'
            +'<div class="card" style="width: 15rem;">'
            +'<div class="card-body">'
            +'<h5 class="card-title">Nombre: '+data[i].nombre+'</h5> '
            +'<p class="texto_tarjetas" >ID Equipo: '+data[i].id_equipo+'</p> '
            +'<p class="texto_tarjetas">Categoria: '+data[i].categoria+'</p> '
            +'<p class="texto_tarjetas">Lugar Procedencia: '+data[i].lugar_procedencia+'</p>'
            +'<div class="element" id="div_1">'
            +'<input type="button"  onclick="addTeam(this)" id="'+data[i].id_equipo+'" value="Añadir Equipo" class="btn btn-primary" />'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>'
    }
    $('#select-equipos').html(html_select);
    });
}*/

var equipos="";
var tamano;
function addTeam(comp){
    equipos+=" "+comp.id;
    tamano = equipos.split(" ");
    tamano = (tamano.length)-1;
    
    //AÑADE EQUIPOS SELECCIONADOS
    $(".teams:last").after(' <input type="button" id="'+comp.id+'r" value="ID EQUIPO: '+comp.id+'" class="btn btn-primary" style="margin-bottom: 10px;" />');
    $(".ganerated").html(' <input type="button" id="generar" disabled="true" value="GENERAR FIXTURE" class="btn btn-primary" style="margin-bottom: 10px;"  data-toggle="modal" data-target="#exampleModalLong" />');

    //DESHABILITAR BOTON DE EQUIPO SELECCIONADO
    $("#"+comp.id+"").attr("disabled", true);

    //Eliminar equipo seleccionado
    $("#"+comp.id+"r").click(function(){
        $("#"+comp.id+"r").remove();
        equipos=equipos.replace(" "+comp.id+"","");
        tamano = tamano-1;
        generarFixture(tamano);
        //HABILITAR BOTON 
        $("#"+comp.id+"").removeAttr("disabled");
    });
    
    //CAMBIAR COLOR BOTÓN
    $("#"+comp.id+"r").hover(function(){
        $(this).css("background-color","red");
        },function(){
            $(this).css("background-color","#007bff");
    });
    
    generarFixture(tamano);
}

function generarFixture(tamano){
   if(tamano>=4){
        $("#generar").removeAttr("disabled");
    }
    else
        $("#generar").attr("disabled", true);
    var arreglo = equipos;
    $("#generar").click(getEquipos(arreglo));
        
        /*$("#generar").click(getEquipos(arreglo));
        /*
            'id_partido',
            'id_torneo',
            'tipo_fase',
            'lugar',
            'hora',
            'fecha',
            'equipo_local',
            'equipo_visitante',
            'estatus_partido',
            'eliminado'
                
    });*/
}


function getEquipos($equipos){
    var html_select = '';
    var equipo_home;
    var equipo_away;
    var route = '/fixtureEquipos/'+$equipos+'';
    console.log(route);
    $.get(route,function(data){
        $(".modal-title").html("TORNEO: "+nombre_torneo+'');
        for(var i =0; i<data.length;i++){
            var pos = data[i];
            html_select+='<div id="'+(i+1)+'"><h4>FASE '+(i+1)+': </h4></div>'
            for(var j=0; j<pos.length; j++){
                var partido = pos[j];
                if(partido.Away!='bye' && partido.Home!='bye'){
                    equipo_home = buscarEquipobyID(partido.Home);
                    equipo_away = buscarEquipobyID(partido.Away);
                    html_select+='<h6>Partido #'+(j+1)+': Equipo No: '+partido.Home+' '+equipo_home+'  VS Equipo No: '+partido.Away+' '+equipo_away+' </h6> <br>'
                }
            }
        }
        $(".modal-body").html(html_select);
        $("#guardar").click(function(){
            

        });
    });
}

function buscarEquipobyID($id){
    for(var i =0; i<no_equipos.length; i++){
        if(no_equipos[i].id_equipo==$id){
            //console.log(no_equipos[i].id_equipo +'nombre: '+no_equipos[i].nombre);
            return no_equipos[i].nombre;
        }
        
    }
}