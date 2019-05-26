@extends('plantilla.plantilla')

@section('content')
<form class="m-3">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">El director técnico ya está registrado?</label>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" data-toggle="collapse" data-target="#si" checked >
            <label class="form-check-label" for="gridRadios1">Ya se encuentra registrado</label>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option1" data-toggle="collapse" data-target="#no" >
            <label class="form-check-label" for="gridRadios2"> se encuentra registrado</label>
        </div>
    </div>

    <div id="si" class="form-row collapse">
        REGISTRADO
    </div>

    <div id="no" class="form-row collapse">
        NO REGISTRADO
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Nombre</label>
            <input type="text" class="form-control" id="validationDefault01" placeholder="Nombre del Equipo" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Procedencia</label>
            <input type="text" class="form-control" id="validationDefault02" placeholder="Lugar de Procedencia" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault03">Fecha</label>
            <input type="date" class="form-control" id="validationDefault03" placeholder="Fecha" required>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
            Agree to terms and conditions
            </label>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
</form>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>

@endsection