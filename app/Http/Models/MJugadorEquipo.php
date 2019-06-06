<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MJugadorEquipo extends Model{
    //nombre de la tabla
    protected $table = 'jugador_equipo';
 
    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_equipo',
        'id_jugador'
    ];

    public function equipo(){
        return $this->belongsTo('MEquipo');
    }

    public function jugador(){
        return $this->belongsTo('MJugador');
    }
}