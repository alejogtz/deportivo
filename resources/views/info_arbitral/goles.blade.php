@extends('plantilla.plantilla') @section('cabeceras')
<script src="assets/jquery/jquery-3.4.1.min.js"></script>
<script src="assets/js/agregar.js"></script>
@endsection @section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div>
            <h3>RESULTADO FINAL</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div>
            <h4>
                 <label >Local: </label>
                 <input type="text" id="totlocal" readonly style="max-width: 60px">
                 <label >  Visitante: </label>
                 <input type="text" id="totvisitante" readonly readonly style="max-width: 60px">
            </h4>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">

            <!--Registro de goles-->
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <center>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h3>GOLES</h3>
                        </button>
                    </center>
                 </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <!--Plantilla para agregar goles-->
                        <template id="plantillagoles">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters ">
                                    <div class="col-md-4">
                                        <img src="..." class="card-img" alt="(Imagen del Jugador)">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Gol anotado por</h5>
                                            <form action="">
                                                <div class="form-group">
                                                    <label for="jugador">Jugador que anoto</label>
                                                    <select class="form-control" id="goljugador">
                                                      <option selected>- Selecciona el jugador -</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="minuto">Gol antotado al minuto</label>
                                                    <input type="text" class="form-control" id="golminuto" placeholder="Registra el minuto">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-sm" style="max-width: 150px;">
                                    Eliminar
                                </button>
                            </div>
                        </template>
                        <!--CONTENIDO IZQUIERDA-->
                        <div class="col-sm border-right border-primary">
                            <div id="goleslocal">
                                <div class="row justify-content-center">
                                    <div><h3>LOCAL</h3></div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="agoleslocal">
                                    Agregar
                                </button>
                            </div>
                        </div>

                        <!--CONTENIDO DERECHA-->
                        <div class="col-sm border-left border-primary">
                            <div id="golesvisitante">
                                <div class="row justify-content-center">
                                    <div>
                                        <h3>VISITANTE</h3></div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="agolesvisitante">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-primary" id="registrargoles">
                        Registrar Goles
                    </button>
                </div>
            </div>

            <!--Registro de titulares-->
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <center>
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h3>TITULARES</h3>
                        </button>
                    </center>
                </h2>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <!--Plantilla para agregar titulares-->
                        <template id="plantillatitulares">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters ">
                                    <div class="col-md-4">
                                        <img src="..." class="card-img" alt="(Imagen del Jugador)">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Jugador Titular</h5>
                                            <div class="form-group">
                                                <label for="jugador">Jugador</label>
                                                <select class="form-control" id="jugadortit">
                                                  <option selected>- Selecciona el jugador -</option>
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-sm" style="max-width: 150px;">
                                    Eliminar
                                </button>
                            </div>
                        </template>
                        <!--CONTENIDO IZQUIERDA-->
                        <div class="col-sm border-right border-primary">
                            <div id="titulareslocal">
                                <div class="row justify-content-center">
                                    <div><h3>LOCAL</h3></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="atitulareslocal">
                                    Agregar
                                </button>
                            </div>
                        </div>

                        <!--CONTENIDO DERECHA-->
                        <div class="col-sm border-left border-primary">
                            <div id="titularesvisitante">
                                <div class="row justify-content-center">
                                    <div><h3>VISITANTE</h3></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="atitularesvisitante">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-primary" id="registrargoles">
                        Registrar Titulares
                    </button>
                </div>
            </div>

            <!--Registro Suplentes-->
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <center>
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h3>SUPLENTES</h3>
                        </button>
                    </center>
                </h2>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <!--Plantilla para agregar suplentes-->
                        <template id="plantillasuplentes">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters ">
                                    <div class="col-md-4">
                                        <img src="..." class="card-img" alt="(Imagen del Jugador)">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-sm" style="max-width: 150px;">
                                    Eliminar
                                </button>
                            </div>
                        </template>
                        <!--CONTENIDO IZQUIERDA-->
                        <div class="col-sm border-right border-primary">
                            <div id="suplenteslocal">
                                <div class="row justify-content-center">
                                    <div><h3>LOCAL</h3></div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="asuplenteslocal">
                                    Agregar
                                </button>
                            </div>
                        </div>

                        <!--CONTENIDO DERECHA-->
                        <div class="col-sm border-left border-primary">
                            <div id="suplentesvisitante">
                                <div class="row justify-content-center">
                                    <div class="col-4"><h3>VISITANTE</h3></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" id="asuplentesvisitante">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-primary" id="registrargoles">
                        Registrar Suplentes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection