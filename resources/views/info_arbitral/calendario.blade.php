@extends('plantilla.plantilla')
@section('cabeceras')
 
<link rel=stylesheet href="/assets/jquery/jquery.calendarPicker.css" type="text/css" media="screen">
<script src="/js/jquery2.min.js"></script>
<script type="text/javascript" src="/assets/jquery/jquery.calendarPicker.js"></script>
<script type="text/javascript" src="/assets/jquery/jquery.mousewheel.js"></script>
<link rel=stylesheet href="/assets/css/estilos.css" type="text/css" >

@endsection

@section('content')
        
<input type="hidden" id="torneo" value="{{ $torneo->id_torneo}}"/> 
<input type="hidden" id="fase" value="{{$torneo->tipo_fase}}"/>
<h2>Selecciona una fecha por favor</h2>
<div id="calendario">
  <div id="dsel2" ></div>
  <br>
</div>
<div id="tarjetas"></div>


<script type="text/javascript" src="/js/info_arbitral/tarjetas.js"></script>


@endsection