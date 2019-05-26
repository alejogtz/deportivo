<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MPartido extends Model{
    //nombre de la tabla
    protected $table = 'partido';

    //llave primaria
    protected $primarykey = 'id_partido';
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_partido',
        'id_torneo',
        'tipo_fase',
        'lugar',
        'hora',
        'fecha',
        'equipo_local',
        'equipo_visitante',
        'estatus_partido',
        'eliminado'
    ];

    public function equipo(){
        return $this->belongsTo('MEquipo');
    }
    
    public function goles(){
        return $this->hasMany('MGol');
    }

    public function tarjetas(){
        return $this->hasMany('MTarjeta');
    }

    public function cambios(){
        return $this->hasMany('MCambio');
    }
}