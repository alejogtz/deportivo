<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MCambio extends Model{
    //nombre de la tabla
    protected $table = 'cambio';

    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_partido',
        'id_equipo',
        'jugador_entra',
        'jugador_sale',
        'minuto',
        'eliminado'
    ];

    public function partido(){
        return $this->belongsTo('MPartido');
    }
}