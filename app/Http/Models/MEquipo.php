<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MEquipo extends Model{
    //nombre de la tabla
    protected $table = 'equipo';
 
    //llave primaria
    protected $primarykey = 'id_equipo';
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_equipo',
        'id_director',
        'nombre',
        'fecha_inscripcion',
        'lugar_procedencia',
        'elimnado'
    ];

    public function directorT(){
        return $this->belongsTo('MDirectorT');
    }


    public function jugadores(){
        return $this->hasMany('MJugador');
    }

    public function partidos(){
        return $this->hasMany('MPartido');
    }
}