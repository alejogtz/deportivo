@extends('plantilla.plantilla')
  @section('content')
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.modal.min.js"></script>
    <script src="js/Fixture/cargar_categorias.js"></script>
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
        
      <h1>SELECCIONA UN TORNEO</h1>
      <select class="form-control" id="select-torneos">
          <option disabled selected>SELECCIONE UN TORNEO</option>
      </select>
            <br>
            <div id="categorias">
              <div class="form-row" id="select-equipos">
                
              </div>
            </div>
            <div class="contenedor" >
              <div class="teams" id='div_1'>
              </div>
              <div class="ganerated" id='div_1'>
              </div>
               <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle"></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        {!!Form::open(array('url' => 'seleccionar2', 'method' => 'POST','autocomplete' => 'off'))!!}
                          @csrf
                          <input type="hidden" id="torneo_select" name="torneo_select">
                          <input type="hidden" id="partidos" name="partidos" >
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" id="guardar" >Guardar cambios</button>
                          {!!Form::close()!!}
                      </div>
                    </div>
                  </div>
                </div>
              

    </div>
    @endsection