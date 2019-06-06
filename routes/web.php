<?php

Route::get('/', function () {
    return view('inicio');
});

///aqui los de fixture
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
//Route::get('seleccion','fixture\FixtureController@cargarCategorias');
Route::get('listado_equipos/{categoria}','fixture\FixtureController@listado_equipos');

Route::get('listado_torneos','fixture\TorneoController@listado_torneos');

//
Route::get('seleccionar','fixture\FixtureController@categorias');
Route::get('fixtureEquipos/{equipos}','fixture\FixtureController@roundRobin');

//INSERTAR PARTIDOS
Route::post('insertar_partidos','fixture\FixtureController@insertar_partidos');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

//aqui los de registro
Route::view('torneos', 'info_arbitral/torneos');
Route::view('calendario', 'info_arbitral/calendario');
Route::get('cate_selecionada/{id}','info_arbitral\partidos_controller@fases_x_categoria');
 

Route::get('registro','info_arbitral\partidos_controller@verRegistro');
Route::get('tarjetas_por_dia/{fecha}&{fase}&{torneo}','info_arbitral\partidos_controller@partidos_hoy');
Route::get('getCategorias','info_arbitral\partidos_controller@getCategorias');
Route::get('getFases/{torneo}','info_arbitral\partidos_controller@fases_categoria');
Route::get('fase_seleccionada/{jornada}&{torneo}','info_arbitral\partidos_controller@calendario_x_fase');
Route::get('registro/{idpar}','info_arbitral\partidos_controller@verRegistro');//muestra la vista para registro de resultados
Route::get('registro/registro2/{idequi}','info_arbitral\partidos_controller@verRegistro2');

Route::get('jugadores/{equipo}','info_arbitral\partidos_controller@jugadores_equipo');

Route::get('tabla_general', 'info_arbitral\tabla_general@tabla_general');
Route::get('tabla_x_torneo/{id_torneo}', 'info_arbitral\tabla_general@tabla_x_torneo');


//para probar la conexion 
Route::get('testDBConnection', function(){
    try {
        DB::connection()->getPdo();
        return response()->json(['mensaje' => 'DB Correctamente']);
    } catch (Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
    //phpinfo();
});





Route::get('equipo/registro',function () {
    return view('registroequipo');
});

Route::post('director/agregar','fixture\DirectorController@agregar');
Route::put('director/editbyid','fixture\DirectorController@editbyid');
Route::put('director/eliminar','fixture\DirectorController@eliminar');
Route::get('director/registros','fixture\DirectorController@getTableDirector');
Route::get('director/all','fixture\DirectorController@list');
<<<<<<< HEAD


=======
>>>>>>> 99b3c23af816fb32946c00a8e07bef396c5bb46b
