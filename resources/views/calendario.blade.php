@extends('plantilla.plantilla')

@section('content')
        
  
<link rel=stylesheet href="assets/jquery/jquery.calendarPicker.css" type="text/css" media="screen">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/jquery/jquery.calendarPicker.js"></script>
<script type="text/javascript" src="assets/jquery/jquery.mousewheel.js"></script>

<h2>Calendario</h2>



<div id="dsel2" style="width:340px"></div>
<br>
<span id="wtf"></span>

<script type="text/javascript">
  var calendarPicker2 = $("#dsel2").calendarPicker({
    monthNames:["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
    years:2,
    months:4,
    days:2,
    showDayArrows:false,
    callback:function(cal) {
      $("#wtf").html("Selected date: " + cal.currentDate);
    }});
</script>
@endsection