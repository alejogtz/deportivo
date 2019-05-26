
var fases = (function(){
    
    var _sercuperaElemento = () => {
        var cosa = document.getElementById("torneo");
        var contenido=cosa.value;
        $.get('/getFases/'+contenido+'', function (data){
       if(data.length>0){
            var tarjetas = '<div class="form-row">';
            for (var i = 0; i < data.length; i++){
            tarjetas+='<div class="col-md-4 mb-3">';
              tarjetas+='<div class="card" style="width: 15rem;">';
              tarjetas+='<img class="card-img-top" src="/assets/img/cancha2.png" alt="Card image cap">';
              tarjetas+=' <div class="card-body">';
              tarjetas += ' <h5 class="card-title">'+data[i].tipo_fase+'</h5>';
              tarjetas+='<a href="/fase_seleccionada/'+data[i].tipo_fase+'&'+contenido+'" class="btn btn-primary">Seleccionar</a>';
              tarjetas+='</div></div></div>';
             }
             tarjetas+='</div>';

         $('#categorias').html(tarjetas);
        }else{
            var tarjetas ='<div >';
            tarjetas += '<h1 >No hay Fases Registradas</h1>';
            tarjetas+='<img src="/assets/img/balon_triste.jpg"  class="centrado">';
            tarjetas+='</div>';
            $('#categorias').html(tarjetas);
        }
   });
    };

    return{
        obtenerfases: _sercuperaElemento
    };

})();
