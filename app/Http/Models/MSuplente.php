<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MSuplente extends Model{
    //nombre de la tabla
    protected $table = 'suplente';

    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_partido',
        'id_equipo',
        'id_jugador',
        //'eliminado'
    ];

    public function partido(){
        return $this->belongsTo('MPartido');
    }

    public function equipo(){
        return $this->belongsTo('MEquipo');
    }

    public function jugador(){
        return $this->belongsTo('MJugador');
    }
}