<?php

Route::get('/', function () {
    return view('inicio');
});

///aqui los de fixture



//aqui los de registro
Route::view('torneos', 'info_arbitral/torneos');
Route::view('calendario', 'info_arbitral/calendario');

Route::get('tarjetas_por_dia/{fecha}','info_arbitral\partidos_controller@partidos_hoy');
Route::get('getCategorias','info_arbitral\partidos_controller@getCategorias');

Route::get('registro','info_arbitral\partidos_controller@verRegistro');





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