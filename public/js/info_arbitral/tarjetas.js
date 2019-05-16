var calendarPicker2 = $("#dsel2").calendarPicker({
    monthNames:["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
    years:2,
    months:4,
    days:2,
    showDayArrows:false,
    callback:function(cal) {
        cargar_tarjetas(cal);
    }});

//var mensaje= document.getElementById("fecha_select").innerHTML
function cargar_tarjetas(cal) {
    $("#fecha_select").html("" + cal.dia);
    $.get('tarjetas_por_dia/'+cal.dia+'', function (data){
        if(data.length>0){
            var tarjetas = '<div class="form-row">';
            for (var i = 0; i < data.length; i++){
            tarjetas+='<div class="col-md-4 mb-3">';
              tarjetas+='<div class="card" style="width: 18rem;">';
              tarjetas+='<img class="card-img-top" src="assets/img/cancha.png" alt="Card image cap">';
              tarjetas+=' <div class="card-body">';
              tarjetas += ' <h5 class="card-title">'+data[i].equipo_local+' vs '+data[i].equipo_visitante+'</h5>';
              tarjetas+='<p class="card-text">Lugar: '+data[i].lugar+' Fecha: '+data[i].fecha+' Hora: '+data[i].hora+'</p>';
              tarjetas+='<a href="#" class="btn btn-primary">Registrar Resultados</a>';
              tarjetas+='</div></div></div>';
             }
             tarjetas+='</div>';
         $('#tarjetas').html(tarjetas);
        }else{
            var tarjetas = '<h1>sin partidos</h1>';
            $('#tarjetas').html(tarjetas);
        }
       
   });
  }
  
    
    
 