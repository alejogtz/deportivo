@extends('plantilla.plantilla')
@section('cabeceras')

<script src="/js/jquery.min.js"></script>
@endsection

@section('content')
<h2>Selecciona una Fase</h2>
<p id="torneo"> {{$torneo}}</p>
<div id="categorias"></div>


<script type="text/javascript" src="/js/info_arbitral/fases.js"></script>
<script>
$( document ).ready(function() {
    fases.obtenerfases();
});
</script>
@endsection
