<?php

namespace App\Http\Controllers\info_arbitral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MTorneo;
use DB;

class tabla_general extends Controller
{

    public function tabla_general()
    { $enviar = MTorneo::pluck('categoria','id_torneo')->where('elimnado','=',false);
        return view('info_arbitral/tablageneral')->with('torneos',$enviar);
    }

    public function tabla_x_torneo($id_torneo){
        $tablageneral =DB::select("sELECT t.equipo,t.pts,t.pj,t.v,t.e,t.d,t.gf,t.gc,t.dif from (select * from torneo(?) ) as t",array($id_torneo));
        return $tablageneral;
    }

}
?>