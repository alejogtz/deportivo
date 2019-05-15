<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MJugador extends Model{
    //nombre de la tabla
    protected $table = 'torneo';

    //llave primaria
    protected $primarykey = 'id_torneo';
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_torneo',
        'nombre',
        'categoria',
        'fecha_inaguracion',
        'fecha_termino',
        'elimnado'
    ];

    public function fases(){
        return $this->hasMany('MFase');
    }

    public function tabla_clasificatorias(){
        return $this->hasMany('MTablaClasificatoria');
    }

    public function tabla_general(){
        return $this->hasMany('MTablaGeneral');
    }
}