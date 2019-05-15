<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MTablaGeneral extends Model{
    //nombre de la tabla
    protected $table = 'tabla_general';

    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_torneo',
        'nombre_equipo',
        'juegos_jugados',
        'juegos_empatados',
        'juegos_perdidos',
        'goles_a_favor',
        'goles_en_contra',
        'diferencia_de_goles',
        'puntos',
        'elimnado'
    ];

    public function tabla_clasificatoria(){
        return $this->belongsTo('MTorneo');
    }
}