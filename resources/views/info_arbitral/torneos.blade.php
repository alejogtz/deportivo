@extends('plantilla.plantilla')
@section('cabeceras')

<script src="js/jquery.min.js"></script>

@endsection

@section('content')
        
 
<h2>Selecciona una Categoria</h2>
<div id="categorias"> </div>

<script type="text/javascript" src="js/info_arbitral/categorias.js"></script>
<script>
$( document ).ready(function() {
    categori.obtenercategorias();
});
</script>

@endsection