<?php

namespace App\Http\Controllers\info_arbitral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MPartido;
use App\Http\Models\MEquipo;
use App\Http\Models\MTorneo;


class partidos_controller extends Controller
{
    public function partidos_hoy($fecha){
       $Partidos = MPartido::select('*')
       ->where('fecha',$fecha)
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
        $Torneos = MTorneo::select('*')->get();
       // print "\n"."equipos".$Torneos;
        return $Torneos;
    }


}
?>