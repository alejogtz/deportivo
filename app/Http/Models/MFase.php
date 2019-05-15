<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class MFase extends Model{
    //nombre de la tabla
    protected $table = 'fase';

    //llave primaria
    protected $primarykey = 'id_fase';
    public $timestamps = false;

    //aqui los elementos a mostrarse en la tabla 
    protected $filltable = ['id_fase','id_torneo','nombre_fase','fecha_inicio','fecha_termin','eliminado'];

    public function partidos(){
        return $this->hasMany('MPartido');
    }
    public function torneo(){
        return $this->belongsTo('MTorneo');
    }
}