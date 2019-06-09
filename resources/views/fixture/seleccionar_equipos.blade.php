@extends('plantilla.plantilla')
  @section('content')
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.modal.min.js"></script>
    <script src="js/Fixture/cargar_categorias.js"></script>
    <div class="m-3">
        
      <h1>SELECCIONA UN TORNEO</h1>
      <select class="form-control" id="select-torneos">
          <option disabled selected>SELECCIONE UN TORNEO</option>
      </select>
            <!--select class="form-control" id="select-categoria" >
                <option disabled selected>SELECCIONE UN TORNEO</option>
                <option value='Ponys Femenil'>Ponys Femenil</option>
                <option value='Ponys Varonil'>Ponys Varonil</option>
                <option value='Sub 15 Femenil'>Sub 15 Femenil</option>
                <option value='Sub 15 Varonil'>Sub 15 Varonil</option>
                <option value='Primera Fuerza Femenil'>Primera Fuerza Femenil</option>
                <option value='Primera Fuerza Varonil'>Primera Fuerza Varonil</option>
                <option value='Master Femenil'>Master Femenil</option>
                <option value='Master Varonil'>Master Varonil</option>
            </select-->
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
                        <form action="seleccionar" method="get"> 
                          @csrf
                          <input type="hidden" id="torneo_selec" name="torneo_select">
                          <input type="hidden" id="partidos" name="partidos" >
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" id="guardar" >Guardar cambios</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              

    </div>
    @endsection