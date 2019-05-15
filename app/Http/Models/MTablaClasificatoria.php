<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MTablaClasificatoria extends Model{
    //nombre de la tabla
    protected $table = 'tabla_clasificatoria';

    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_torneo',
        'ronda',
        'id_equipo',
        'elimnado'
    ];

    public function tabla_clasificatoria(){
        return $this->belongsTo('MTorneo');
    }
}