<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MGol extends Model{
    //nombre de la tabla
    protected $table = 'gol';

    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_partido',
        'id_jugador',
        'minuto',
        'equipo_en_contra',
        'equipo_en_favor_de',
        'tipo_anotacion',
        'eliminado'
    ];

    public function partido(){
        return $this->belongsTo('MPartido');
    }
}