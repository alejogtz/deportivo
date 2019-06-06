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

Route::post('director/editbyid','fixture\DirectorController@editbyid');
Route::put('director/editbyid2','fixture\DirectorController@editbyid2');
Route::get('director/registros','fixture\DirectorController@getTableDirector');
Route::get('director/all','fixture\DirectorController@list');


