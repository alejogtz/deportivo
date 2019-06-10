@extends('plantilla.plantilla')
@section('content')

<script src='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
<link href="{{ asset('assets/css/registros.css') }} " rel="stylesheet">


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
            <div class="col-md-6 mb-3">
                <h2>Administrar <b>Equipos</b></h2>
            </div>
            <div class="col-md-6 mb-3">
                <a href="#addEquipoModal" onclick="agregaEquipo()" class="btn btn-success float-right d-flex" data-toggle="modal">
                    <i class="material-icons mr-1">&#xE147;</i> <span>Agregar Nuevo Equipo</span>
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive-xl table-hover table-striped">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Director Técnico</th>
                    <th scope="col">Fecha Inscripción</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dis as $d)
                <tr>
                    <th scope="row">{{ $d->id_equipo }}</th>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->id_director->nombre.' '. $d->id_director->apellido_p.' '.$d->id_director->apellido_m}}</td>
                    <td>{{ $d->fecha_inscripcion }}</td>
                    <td>
                        <a onclick = "mapaEquipo({{ $d }})" href="#mapaEquipoModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Mapa">map</i>
                        </a>
                    </td>
                    <td>{{ $d->categoria }}</td>
                    @if( $d->elimnado )
                        <td>NO</td>
                    @else
                        <td>SI</td>
                    @endif
                    <td>
                        <a onclick = "editEquipo({{ $d }})" href="#editEquipoModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a onclick = "deleteEquipo({{ $d }})" href="#deleteEquipoModal" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!-- Add Modal HTML -->
    <div id="addEquipoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'equipo/agregar', 'method' => 'POST','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Agregar Equipo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre de Equipo</label>
                            <input name="nombre_a" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Director Técnico</label>
                            <select name="id_director_a" id="id_director_a" type="text" class="form-control" placeholder="Seleciona..." required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Inscripción</label>
                            <input name="fecha_inscripcion_a" type="date" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Lugar de Procedencia</label>
                            <div class="d-flex justify-content-center img-fluid">
                                <div id="map" class="s9 mapa">
                                </div>
                            </div>
                            <input name="lugar_procedencia_a" id="lugar_procedencia_a" type="hidden" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Categoria equipo</label>
                            <select name="categoria_a" id="categoria_a" class="form-control" required>
                                <option selected disabled>Seleciona una categoria...</option>
                                <option value="Master Femenil">Master Femenil</option>
                                <option value="Primera Fuerza Femenil">Primera Fuerza Femenil</option>
                                <option value="Ponys Varonil">Ponys Varonil</option>
                                <option value="Master Varonil">Master Varonil</option>
                                <option value="Sub 15 Varonil">Sub 15 Varonil</option>
                                <option value="Sub 15 Femenil">Sub 15 Femenil</option>
                                <option value="Primera Fuerza Varonil">Primera Fuerza Varonil</option>
                                <option value="Ponys Femenil">Ponys Femenil</option>
                            </select>
                        </div>	
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Agregar">
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEquipoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'equipo/eliminar', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Eliminar Equipo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input name="id_equipo_d" id="id_equipo_d" type="hidden" class="form-control" required>					
                        <p>Estás seguro que desea eliminar permanentemente este campo?</p>
                        <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>


    <div id="mapaEquipoModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!!Form::open(array('url' => 'equipo/eliminar', 'method' => 'PUT','autocomplete' => 'off'))!!}
                        <div class="modal-header">						
                            <h4 class="modal-title">Lugar de Procedencia del Equipo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Lugar de Procedencia</label>
                                <div class="d-flex justify-content-center img-fluid">
                                    <div id="map_equipo" class="s9 mapa">
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    <!-- Edir Modal HTML -->
    <div id="editEquipoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'equipo/editbyid', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Editar Equipo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">	
                        <div class="form-group">
                            <input name="id_equipo_e" id="id_equipo_e" type="hidden" class="form-control" required>
                            <label>Nombre de Equipo</label>
                            <input name="nombre_e" id="nombre_e" type="text" class="form-control" required>
                        </div>				
                        <div class="form-group">
                            <label>Director Técnico</label>
                            <select name="id_director_e" id="id_director_e" type="text" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Inscripción</label>
                            <input name="fecha_inscripcion_e" id="fecha_inscripcion_e" type="date" class="form-control" required>
                        </div>	
                        <div class="form-group">
                            <label>Lugar de Procedencia</label>
                            <div class="d-flex justify-content-center img-fluid">
                                <div id="map_e" class="s9 mapa">
                                </div>
                            </div>
                            <input name="lugar_procedencia_e" id="lugar_procedencia_e" type="hidden" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Categoria equipo</label>
                            <select name="categoria_e" id="categoria_e" class="form-control" required>
                                <option value="Master Femenil">Master Femenil</option>
                                <option value="Primera Fuerza Femenil">Primera Fuerza Femenil</option>
                                <option value="Ponys Varonil">Ponys Varonil</option>
                                <option value="Master Varonil">Master Varonil</option>
                                <option value="Sub 15 Varonil">Sub 15 Varonil</option>
                                <option value="Sub 15 Femenil">Sub 15 Femenil</option>
                                <option value="Primera Fuerza Varonil">Primera Fuerza Varonil</option>
                                <option value="Ponys Femenil">Ponys Femenil</option>
                            </select>
                        </div>		
                        <div class="form-group">
                            <label>Disponible</label>
                            <select name="eliminado_e" id="eliminado_e" class="form-control">
                                
                            </select>
                        </div>					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/fixture/map.js') }}"></script>
@endsection