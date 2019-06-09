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
            <div class="col-md-6 mb-3">
                <h2>Administrar <b>Torneos</b></h2>
            </div>
            <div class="col-md-6 mb-3">
                <a href="#addTorneoModal" class="btn btn-success float-right d-flex" data-toggle="modal">
                    <i class="material-icons mr-1">&#xE147;</i> <span>Agregar Nuevo Torneo</span>
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
                    <th scope="col">Categoria</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dis as $d)
                <tr>
                    <td scope="row">{{ $d->id_torneo }}</td>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->categoria }}</td>
                    <td>{{ $d->fecha_inaguracion }}</td>
                    <td>{{ $d->fecha_termino }}</td>
                    @if( $d->elimnado )
                        <td>NO</td>
                    @else
                        <td>SI</td>
                    @endif
                    <td>
                        <a onclick = "editTorneo({{ $d }})" href="#editTorneoModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a onclick = "deleteTorneo({{ $d }})" href="#deleteTorneoModal" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!-- Add Modal HTML -->
    <div id="addTorneoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'torneo/agregar', 'method' => 'POST','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Agregar Torneo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombre_a" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <input name="categoria_a" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha Inauguración</label>
                            <input name="fecha_inaguracion_a" type="date" class="form-control" required>
                        </div>	
                        <div class="form-group">
                            <label>Fecha Termino</label>
                            <input name="fecha_termino_a" type="date" class="form-control" required>
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
    <div id="deleteTorneoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'torneo/eliminar', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Eliminar Torneo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input name="id_torneo_d" id="id_torneo_d" type="hidden" class="form-control" required>					
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

    <!-- Edir Modal HTML -->
    <div id="editTorneoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'torneo/editbyid', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Editar Torneo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <input name="id_torneo_e" id="id_torneo_e" type="hidden" class="form-control" required>
                            <label>Nombre</label>
                            <input name="nombre_e" id="nombre_e" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <input name="categoria_e" id="categoria_e" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Incio</label>
                            <input name="fecha_inaguracion_e" id="fecha_inaguracion_e" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Cierre</label>
                            <input name="fecha_termino_e" id="fecha_termino_e" type="date" class="form-control" required>
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