@extends('plantilla.plantilla')
@section('cabeceras')

<script src="js/jquery.min.js"></script>
<link rel=stylesheet href="assets/css/estilos.css" type="text/css" >

@endsection

@section('content')
        
 
<h2>Selecciona un Torneo</h2>
<div id="categorias"> </div>

<script type="text/javascript" src="js/info_arbitral/categorias.js"></script>
<script>
$( document ).ready(function() {
    categori.obtenercategorias();
});
</script>
 
@endsection