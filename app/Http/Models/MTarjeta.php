<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MTarjeta extends Model{
    //nombre de la tabla
    protected $table = 'tarjeta';

    //llave primaria
    protected $primarykey = null;
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_partido',
        'id_jugador',
        'minuto',
        'tipo',
        //'eliminado'
    ];

    public function partido(){
        return $this->belongsTo('MPartido');
    }
}