<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MEquipo;
use App\Http\Models\MPartido;
use App\Http\Models\MTorneo;
/*
1.- Fixture 
	El algoritmo va agenerar los patidos y los va a guardar(base) (con el estas seguro que desas generarlo?) Se van a mostrar la lista de partidos generados en una vista(front end)

*/

class FixtureController extends Controller{
    public function getViewSelect(){
        return view('fixture/seleccionarequipo');
	}
	
	public function listado_equipos($categoria){
        $al = MEquipo::select('id_equipo','categoria','nombre','lugar_procedencia','id_director')
		->where('categoria',$categoria)
        ->get();
        return $al;
    }
    public function categorias(){
		$enviar = MEquipo::groupBy('categoria','id_equipo')
		->orderBy('categoria')
		->pluck('categoria','id_equipo');
        return view('fixture/seleccionar_equipos')->with('categorias',$enviar);
	}
	function roundRobin($equipos){// array $teams ){
		$equipos=substr($equipos,1);

		$teams = explode(" ",$equipos);
		shuffle($teams);

		if (count($teams)%2 != 0){
			array_push($teams,"bye");
		}
		$away = array_splice($teams,(count($teams)/2));
		$home = $teams;
		for ($i=0; $i < count($home)+count($away)-1; $i++)
		{
			for ($j=0; $j<count($home); $j++)
			{
				$round[$i][$j]["Home"]=$home[$j];
				$round[$i][$j]["Away"]=$away[$j];
			}
			if(count($home)+count($away)-1 > 2)
			{
				$s = array_splice( $home, 1, 1 );
				$slice = array_shift( $s  );
				array_unshift($away,$slice );
				array_push( $home, array_pop($away ) );
			}
		}
		return $round;
	}

	function insertar_partidos(Request $request){
<<<<<<< HEAD
		$torneo = $request->input('torneo_select');
=======
>>>>>>> 134252a52609cfd08b96fb99c72c2d8a4f3f6a3e
		$array = json_decode($request->partidos,true);
		for ($i=0; $i < count($array); $i++) { 
			$array2 = $array[$i];
			for ($j=0; $j < count($array2); $j++) { 
<<<<<<< HEAD
				if($array2[$j]["Home"]!='bye' && $array2[$j]["Away"]!='bye'){                  
					print_r('Fase: '.($i+1).': '.$array2[$j]["Home"].'  vs  '.$array2[$j]["Away"]);
					echo '<br>'; 
					MPartido::insert(['id_torneo'=>$torneo,'tipo_fase'=>'Regular','numero_fase'=>($i+1) ,'equipo_local'=>$array2[$j]["Home"],'equipo_visitante'=>$array2[$j]["Away"] ]);
				}
			}
		}
		//cambiamos eliminado de torneo a true para que no se vuelva a cargar
		$torneo_e=MTorneo::find($torneo);
		$torneo_e->elimnado='true';
		$torneo_e->save();
		return back()
        ->with('success','Se han guardado correctamente los partidos.'); 
=======
				print_r('Fase: '.($i+1).'  :'.$array2[$j]["Home"].'  vs  '.$array2[$j]["Away"]);
				echo '<br>'; 
			}
		}
>>>>>>> 134252a52609cfd08b96fb99c72c2d8a4f3f6a3e
	}

}