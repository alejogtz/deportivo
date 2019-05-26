<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MTorneo extends Model{
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
}