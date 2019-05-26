<?php

namespace App\Http\Controllers\info_arbitral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MPartido;
use App\Http\Models\MEquipo;
use App\Http\Models\MTorneo;
use App\Http\Models\MJugador;
use App\Http\Models\MFase;


class partidos_controller extends Controller
{
    public function partidos_hoy($fecha,$fase){
       $Partidos = MPartido::select('*')
       ->where('fecha',$fecha)->where('if_fase',$fase)
       ->get(); 

       foreach($Partidos as  $valor) {
            $Equipos1 = MEquipo::where('id_equipo','=',$valor->equipo_local)->first();
            $valor->equipo_local=$Equipos1->nombre;

            $Equipos2 = MEquipo::where('id_equipo','=',$valor->equipo_visitante)->first();
            $valor->equipo_visitante=$Equipos2->nombre;
           // print "\n"."equipos".$valor;
       }
       return $Partidos;
    }


    public function getCategorias() {
        $Torneos = MTorneo::select('*')->where('elimnado',false)->get();
       // print "\n"."equipos".$Torneos;
        return $Torneos;
    }

    /*Este metodo devuelve la vista del formulario para registrar
    los goles, los jugadores titulares y los jugadores suplentes*/
    public function verRegistro()
    {
        return view("info_arbitral\goles");
    }

}
?>