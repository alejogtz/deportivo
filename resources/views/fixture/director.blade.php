@extends('plantilla.plantilla')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="m-3">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h2>Administrar <b>Directores</b></h2>
            </div>
            <div class="col-md-6 mb-3">
                <a href="#addDirectorModal" class="btn btn-success float-right d-flex" data-toggle="modal">
                    <i class="material-icons mr-1">&#xE147;</i> <span>Agregar Nuevo Director</span>
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive-xl table-hover table-striped">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Identificador</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Eliminado por bandera</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dis as $d)
                <tr>
                    <th scope="row">{{ $d->id_director }}</th>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->apellido_p }}</td>
                    <td>{{ $d->apellido_m }}</td>
                    @if( $d->eliminado )
                        <td>SI</td>
                    @else
                        <td>NO</td>
                    @endif
                    <td>
                        <a onclick = "editDirector({{ $d }})" href="#editDirectorModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a onclick = "deleteDirector({{ $d }})" href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!-- Add Modal HTML -->
    <div id="addDirectorModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'director/agregar', 'method' => 'POST','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Agregar Director</h4>
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
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'director/eliminar', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Eliminar Director</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input name="id_director" id="id_director" type="hidden" class="form-control" required>					
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
    <div id="editDirectorModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {!!Form::open(array('url' => 'director/editbyid', 'method' => 'PUT','autocomplete' => 'off'))!!}
                    <div class="modal-header">						
                        <h4 class="modal-title">Editar Director</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <input name="id_director" id="id_director" type="hidden" class="form-control" required>
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
                            <label>Eliminado por bandera</label>
                            <select name="eliminado" id="eliminado" class="form-control">
                                
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
<script src="{{ asset('assets/js/fixture/crud_script.js') }}"></script>
@endsection