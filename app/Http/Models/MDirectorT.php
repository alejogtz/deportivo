<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MDirectorT extends Model{
    //nombre de la tabla
    protected $table = 'directort';

    //llave primaria
    protected $primarykey = 'id_director';
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = [
        'id_director',
        'nombre',
        'apellido_p',
        'apellido_m',
        'elimnado'
    ];

    public function equipos(){
        return $this->hasMany('MEquipo');
    }
}