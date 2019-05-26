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

Route::post('director/editbyid','fixture\DirectorController@editbyid');
Route::put('director/editbyid2','fixture\DirectorController@editbyid2');
Route::get('director/registros','fixture\DirectorController@getTableDirector');
Route::get('director/all','fixture\DirectorController@list');