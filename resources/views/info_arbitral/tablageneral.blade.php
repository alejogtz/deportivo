@extends('plantilla.plantilla')
@section('cabeceras')
<script src="/js/jquery.min.js"></script>
@endsection

@section('content')
<h2>aqui va la tabla general</h2>



{{ Form::select('id_torneo',$torneos,null,
['id' =>'select-torneo','class'=>'form-control','placeholder'=>'SELECCIONE UN TORNEO'])
}}
<label id="sel1"></label>
<script type="text/javascript" src="/js/info_arbitral/tabla_general.js"></script>

@endsection
