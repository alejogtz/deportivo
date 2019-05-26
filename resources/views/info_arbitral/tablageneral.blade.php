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
<div class="table-responsive">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Pos</th>
      <th scope="col">Club</th>
      <th scope="col">JJ</th>
      <th scope="col">JG</th>
      <th scope="col">JE</th>
      <th scope="col">JP</th>
      <th scope="col">GF</th>
      <th scope="col">GC</th>
      <th scope="col">Dif</th>
      <th scope="col">PTS</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
  </tbody>
</table>
</div>
<p>
<strong>JJ</strong>  
<em>Juegos Jugados</em>
<strong>JG</strong>
<em>Juegos Ganados</em>
<strong>JE</strong>
<em>Juegos Empatados</em>
<strong>JP</strong>
<em>Juegos Perdidos</em>
<strong>GF</strong>
<em>Goles a Favor</em>
<strong>GC</strong>
<em>Goles en Contra</em>
<strong>Dif</strong>
<em>Diferencia de Goles</em>
<strong>PTS</strong>
<em>Puntos</em></p>


<script type="text/javascript" src="/js/info_arbitral/tabla_general.js"></script>

@endsection
