<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MJugador extends Model{
    //nombre de la tabla
    protected $table = 'jugador';

    //llave primaria
    protected $primaryKey = 'id_jugador';
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_jugador',
        'nombre',
        'apellido_p',
        'apellido_m',
        'no_playera',
        'estatura',
        'posicion',
        'fecha_nac',
        'foto',
        'sexo',
        'elimnado'
    ];
}