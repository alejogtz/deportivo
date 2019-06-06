<?php

Route::get('/', function () {
    return view('inicio');
});

///aqui los de fixture



//aqui los de registro
Route::view('torneos', 'info_arbitral/torneos');
Route::view('calendario', 'info_arbitral/calendario');
Route::get('cate_selecionada/{id}','info_arbitral\partidos_controller@fases_x_categoria');
 

Route::get('registro','info_arbitral\partidos_controller@verRegistro');//muestra la vista para registro de resultados

Route::get('registro2/{partido}','info_arbitral\partidos_controller@verRegistro2');

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
Route::get('director/registros','fixture\DirectorController@getTable');
Route::get('director/all','fixture\DirectorController@list');
Route::get('director/allDispobible','fixture\DirectorController@listDisponible');

Route::post('jugador/agregar','fixture\JugadorController@agregar');
Route::put('jugador/editbyid','fixture\JugadorController@editbyid');
Route::put('jugador/eliminar','fixture\JugadorController@eliminar');
Route::get('jugador/registros','fixture\JugadorController@getTable');
Route::get('jugador/all','fixture\JugadorController@list');

Route::post('equipo/agregar','fixture\EquipoController@agregar');
Route::put('equipo/editbyid','fixture\EquipoController@editbyid');
Route::put('equipo/eliminar','fixture\EquipoController@eliminar');
Route::get('equipo/registros','fixture\EquipoController@getTable');
Route::get('equipo/all','fixture\EquipoController@list');

Route::post('torneo/agregar','fixture\TorneoController@agregar');
Route::put('torneo/editbyid','fixture\TorneoController@editbyid');
Route::put('torneo/eliminar','fixture\TorneoController@eliminar');
Route::get('torneo/registros','fixture\TorneoController@getTable');
Route::get('torneo/all','fixture\TorneoController@list');
Route::get('listado_torneos','fixture\TorneoController@listado_torneos');

Route::post('jugador_equipo/agregar','fixture\JugadorEquipoController@agregar');
Route::put('jugador_equipo/editbyid','fixture\JugadorEquipoController@editbyid');
Route::put('jugador_equipo/eliminar','fixture\JugadorEquipoController@eliminar');
Route::get('jugador_equipo/registros','fixture\JugadorEquipoController@getTable');
Route::get('jugador_equipo/all','fixture\JugadorEquipoController@list');
Route::get('jugador_equipo/en_equipo/{id}','fixture\JugadorEquipoController@listJugadoresInEquipo');
Route::get('jugador_equipo/no_en_equipo/{id}','fixture\JugadorEquipoController@listJugadoresNotInEquipo');