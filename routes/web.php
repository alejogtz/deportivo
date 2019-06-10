<?php

Route::get('/', function () {
    return view('inicio');
});

///aqui los de fixture



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
Route::post('registro/insertargl/','info_arbitral\partidos_controller@insertagol');
Route::post('registro/insertatar/','info_arbitral\partidos_controller@insertatarjeta');
Route::post('registro/insertartit/','info_arbitral\partidos_controller@insertatitulares');
Route::post('registro/insertarsup/','info_arbitral\partidos_controller@insertasuplentes');
Route::post('registro/insertarcam/','info_arbitral\partidos_controller@insertacambios');
/*{id_partidol}&{goljugadorl}&{golminutol}&{contradel}&{favordel}&{tipol}*/
Route::get('jugadores/{equipo}','info_arbitral\partidos_controller@jugadores_equipo');

Route::get('tabla_general', 'info_arbitral\tabla_general@tabla_general');

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