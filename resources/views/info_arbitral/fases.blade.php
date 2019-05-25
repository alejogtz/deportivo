@extends('plantilla.plantilla')
@section('cabeceras')

<script src="/js/jquery.min.js"></script>
@endsection

@section('content')
<h2>TORNERO {{$torneo->nombre}}</h2>
<h2> CATEGORIA {{$torneo->categoria}}</h2>
<h2>Selecciona una Fase</h2>
<input type="hidden" id="torneo" value="{{$torneo->id_torneo}}"/>
<div id="categorias"></div>


<script type="text/javascript" src="/js/info_arbitral/fases.js"></script>
<script>
$( document ).ready(function() {
    fases.obtenerfases();
});
</script>
@endsection
