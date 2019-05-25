
var categori = (function(){
    
    var _sercuperaElemento = () => {
        $.get('getCategorias', function (data){
       if(data.length>0){
            var tarjetas = '<div class="form-row">';
            for (var i = 0; i < data.length; i++){
            tarjetas+='<div class="col-md-4 mb-3">';
              tarjetas+='<div class="card" style="width: 15rem;">';
              tarjetas+='<img class="card-img-top" src="assets/img/cancha2.png" alt="Card image cap">';
              tarjetas+=' <div class="card-body">';
              tarjetas += ' <h5 class="card-title">'+data[i].nombre+'</h5>';
              tarjetas+='<p class="texto_tarjetas">Categoria:</p>';
              tarjetas+='<p class="texto_tarjetas">'+data[i].categoria+'</p>';
              tarjetas+='<p class="texto_tarjetas" >Fecha Inauguracion: </p>';
              tarjetas+='<p class="texto_tarjetas">'+data[i].fecha_inaguracion+'</p>';
              tarjetas+='<p class="texto_tarjetas">Fecha Termino:</p>';
              tarjetas+='<p class="texto_tarjetas">'+data[i].fecha_termino+'</p>';
              tarjetas+='<a href="cate_selecionada/'+data[i].id_torneo+'" class="btn btn-primary">Seleccionar</a>';
              tarjetas+='</div></div>';
              tarjetas+='</div>';
             }
             tarjetas+='</div>';

         $('#categorias').html(tarjetas);
        }else{
            var tarjetas ='<div >';
            tarjetas += '<h1 >No hay Torneos Registrados</h1>';
            tarjetas+='<img src="assets/img/balon_triste.jpg"  class="centrado">';
            tarjetas+='</div>';
            $('#categorias').html(tarjetas);
        }
   });
    };

    return{
        obtenercategorias: _sercuperaElemento
    };

})();
