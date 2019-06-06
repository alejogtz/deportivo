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
<div class="m-3">
    <div class="table-title">
        <div class="row">
            <div class="col-md-3 mb-3">
                <h2>Agregar <b> Jugadores</b></h2>
            </div>
            <div class="col-md-6 mb-3 text-center">
                
                <h2>
                    <b id="nombre_equipo">
                        @if($equipo = Session::get('equipo'))
                            {{ $equipo->nombre }}
                        @endif
                    </b>
                </h2>
            </div>
            <div class="col-md-3 mb-3">
                <select id="equipo_selected" onchange="equipoSelecionado()" class="browser-default custom-select">
                    <option selected disabled>Seleciona un equipo</option>  
                    @foreach ($equipos as $d)
                        @if($equipo = Session::get('equipo')) 
                            @if($d->id_equipo==$equipo->id_equipo)  
                            <option value="{{ $d->id_equipo }}" selected> {{ $d->nombre }} </option>
                            @else
                            <option value="{{ $d->id_equipo }}"> {{ $d->nombre }} </option>
                            @endif
                        @else
                        <option value="{{ $d->id_equipo }}"> {{ $d->nombre }} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3 text-center">
                <h3>Agregados en el equipo</h3>
            </div>
        </div>
    </div>

    <div class="table-responsive-xl table-hover table-striped">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">No Playera</th>
                    <th scope="col">Estatura</th>
                    <th scope="col">Posición</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody id="equipo_pertenece">
                @if($jugadores = Session::get('jugadores'))  
                    @foreach ($jugadores as $j)
                        <tr>
                            <td>{{ $j->id_jugador }}</td>
                            <td>{{ $j->nombre }}</td>
                            <td>{{ $j->no_playera }}</td>
                            <td>{{ $j->estatura }}</td>
                            <td>{{ $j->posicion }}</td>
                            <td>{{ $j->sexo }}</td>
                            <td>{{ $j->edad }}</td>
                            <td>
                                <a onclick="deleteDeEquipo({{$j->id_jugador}} , {{$equipo->id_equipo}})" href="#deleteDeEquipo" class="delete" data-toggle="modal">
                                    <i class="material-icons text-danger" data-toggle="tooltip" title="Remover">remove_circle</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="table-title">
        <div class="row">
            <div class="col-md-12 mb-3 text-center">
                <h3>Disponibles para agregar al equipo</h3>
            </div>
        </div>
    </div>

    <div class="table-responsive-xl table-hover table-striped">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">No Playera</th>
                        <th scope="col">Estatura</th>
                        <th scope="col">Posición</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody id="equipo_no_pertenece">
                    @if($jugadoresno = Session::get('jugadoresno'))  
                        @foreach ($jugadoresno as $j)
                            <tr>
                                <td>{{ $j->id_jugador }}</td>
                                <td>{{ $j->nombre }}</td>
                                <td>{{ $j->no_playera }}</td>
                                <td>{{ $j->estatura }}</td>
                                <td>{{ $j->posicion }}</td>
                                <td>{{ $j->sexo }}</td>
                                <td>{{ $j->edad }}</td>
                                <td>
                                    <a onclick="agregarAlEquipo({{$j->id_jugador}} , {{$equipo->id_equipo}})" href="#agregarAlEquipo" class="delete" data-toggle="modal">
                                        <i class="material-icons text-success" data-toggle="tooltip" title="Agregar">add_circle</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>


    <!-- Delete Modal HTML -->
    <div id="agregarAlEquipo" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'jugador_equipo/agregar', 'method' => 'POST','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Agregar Jugador al Equipo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input name="id_jugador_a" id="id_jugador_a" type="hidden" class="form-control" required>		
                        <input name="id_equipo_a" id="id_equipo_a" type="hidden" class="form-control" required>					
                        <p>Estás seguro que deseas agregar el jugador al equipo?</p>
                        <p class="text-success"><small>Clic para continuar.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Agregar">
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

    <div id="deleteDeEquipo" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!!Form::open(array('url' => 'jugador_equipo/eliminar', 'method' => 'PUT','autocomplete' => 'off'))!!}
                        <div class="modal-header">						
                            <h4 class="modal-title">Borrar Jugador del Equipo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input name="id_jugador_d" id="id_jugador_d" type="hidden" class="form-control" required>		
                            <input name="id_equipo_d" id="id_equipo_d" type="hidden" class="form-control" required>					
                            <p>Estás seguro que deseas borrar al jugador del equipo?</p>
                            <p class="text-warning"><small>Clic para continuar.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-danger" value="Borrar">
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    

</div>
@endsection