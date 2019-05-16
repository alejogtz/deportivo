@extends('plantilla.plantilla')

@section('content')
        
  
<link rel=stylesheet href="assets/jquery/jquery.calendarPicker.css" type="text/css" media="screen">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/jquery/jquery.calendarPicker.js"></script>
<script type="text/javascript" src="assets/jquery/jquery.mousewheel.js"></script>

<h2>Selecciona una fecha por favor</h2>
<div id="calendario">
  <div id="dsel2" ></div>
  <br>
  <span id="fecha_select"></span>
</div>
<div id="tarjetas"></div>


<script type="text/javascript" src="js/info_arbitral/tarjetas.js"></script>

@endsection