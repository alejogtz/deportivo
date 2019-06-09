@extends('plantilla.plantilla')
@section('content')
<!--ALERT FOR ALL-->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Uppss!</strong> Algo salio mal, intentalo nuevamente.
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<script src='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />


<div id='map' style='width: 400px; height: 300px;'></div>

<script>

mapboxgl.accessToken = 'pk.eyJ1IjoiZ29sZGVuaHVudGVyMjEiLCJhIjoiY2p3cGkxYnhtMHk5aTQ0bzZ4dnNkdzRhNiJ9.p6ZCYpoQ1vAyg6SLhTR8hw';
var map = new mapboxgl.Map({
container: 'map',
center: [-122.420679, 37.772537],
zoom: 13,
style: 'mapbox://styles/mapbox/streets-v11'
});
</script>
@endsection