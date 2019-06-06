@extends('plantilla.plantilla')
@section('content')
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
                <h2>Administrar <b>Jugadores</b></h2>
            </div>
            <div class="col-md-6 mb-3">
                <a href="#addJugadorModal" class="btn btn-success float-right d-flex" data-toggle="modal">
                    <i class="material-icons mr-1">&#xE147;</i> <span>Agregar Nuevo Jugador</span>
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive-xl table-hover table-striped">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">No. Playera</th>
                    <th scope="col">Estatura</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dis as $d)
                <tr>
                    <th scope="row">{{ $d->id_jugador }}</th>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->apellido_p }}</td>
                    <td>{{ $d->apellido_m }}</td>
                    <td>{{ $d->no_playera }}</td>
                    <td>{{ $d->estatura }}</td>
                    <td>{{ $d->fecha_nac }}</td>
                    @if( $d->sexo == 'M' )
                        <td>Mujer</td>
                    @else
                        <td>Hombre</td>
                    @endif

                    @if( $d->foto == null )
                        <td><img src="{{ asset('assets/images_jugador/user_default.png') }}" class="img-fluid image_profile rounded-circle"> </td>
                    @else
                        <td>
                            <a onclick = "verFoto({{ $d }})" href="#fotoJugadorModal" data-toggle="modal">
                                <img src="{{ asset('assets/images_jugador/'.$d->foto)}}" class="img-fluid image_profile rounded-circle">
                            </a>
                        </td>
                    @endif

                    @if( $d->elimnado )
                        <td>NO</td>
                    @else
                        <td>SI</td>
                    @endif
                    <td>
                        <a onclick = "editJugador({{ $d }})" href="#editJugadorModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a onclick = "deleteJugador({{ $d }})" href="#deleteJugadorModal" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
     <!-- Add Modal HTML -->
    <div id="addJugadorModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'jugador/agregar', 'method' => 'POST','autocomplete' => 'off', 'files' => true))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Agregar Jugador</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input name="apellido_p" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input name="apellido_m" type="text" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Numero de Playera</label>
                            <input name="no_playera" type="number" class="form-control" value="1" min="1" max="9999" required>
                        </div>	
                        <div class="form-group">
                            <label>Estatura</label>
                            <input name="estatura" type="number" class="form-control" value="100" min="100" max="200" required>
                        </div>	
                        <div class="form-group">
                            <label>Posicion</label>
                            <select name="posicion" type="text" class="form-control" required>
                                <option disabled selected>Selecciona..</option>
                                <option value="Delantero">Delantero</option>
                                <option value="Medio">Medio</option>
                                <option value="Defensa">Defensa</option>
                                <option value="Portero">Portero</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="sexo" type="text" class="form-control" required>
                                <option disabled selected>Selecciona sexo..</option>
                                <option value="M">Mujer</option>
                                <option value="H">Hombre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input name="fecha_nac" type="date" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Foto del Jugador</label>
                            <input name="foto" type="file" class="form-control" accept="image/*">
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
    <div id="deleteJugadorModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'jugador/eliminar', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Eliminar Jugador</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input name="id_jugador" id="id_jugador" type="hidden" class="form-control" required>					
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

    <!-- Picture Modal HTML -->
    <div id="fotoJugadorModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!!Form::open()!!}
                        <div class="modal-header">						
                            <h4 class="modal-title">Foto del Jugador</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <img id="ver_imagen" class="img-fluid mx-auto d-block rounded-circle image_jugador"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    <!-- Edit Modal HTML -->
    <div id="editJugadorModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'jugador/editbyid', 'method' => 'PUT','autocomplete' => 'off', 'files' => true))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Editar Jugador</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <input name="id_jugador" id="id_jugador_edit" type="hidden" class="form-control">					
                            <label>Nombre</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input name="apellido_p" id="apellido_p" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input name="apellido_m" id="apellido_m" type="text" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Numero de Playera</label>
                            <input name="no_playera" id="no_playera" type="number" class="form-control" value="1" min="1" max="9999" required>
                        </div>	
                        <div class="form-group">
                            <label>Estatura</label>
                            <input name="estatura" id="estatura" type="number" class="form-control" value="100" min="100" max="200" required>
                        </div>	
                        <div class="form-group">
                            <label>Posicion</label>
                            <select name="posicion" id="posicion" type="text" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="sexo" id="sexo" type="text" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input name="fecha_nac" id="fecha_nac" type="date" class="form-control" required>
                        </div>		
                        <div class="form-group">
                            <label>Foto del Jugador</label>
                            <img id="imagen_jugador" class="img-fluid mx-auto d-block image_jugador"/>
                            <input name="foto_edit" id="foto_edit" type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Disponible</label>
                            <select name="eliminado" id="eliminado" type="text" class="form-control" required>
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
@endsection