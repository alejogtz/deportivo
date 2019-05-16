<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
///aqui los de fixture

Route::get('/', function () {
    return view('inicio');
});

//aqui los de registro
Route::get('/', function () {
    return view('inicio');
});
Route::view('calendario', 'calendario');
Route::get('tarjetas_por_dia/{fecha}','info_arbitral\partidos_controller@partidos_hoy');

Route::get('testDBConnection', function(){
    try {
        DB::connection()->getPdo();
        return response()->json(['mensaje' => 'DB Correctamente']);
    } catch (Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
    //phpinfo();
});