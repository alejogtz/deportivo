<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MEquipo;

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

	/*function fixture($equipos){
		
		$equipos=substr($equipos,1);
		//print_r("equiposss",$players);
		echo($equipos);
		echo('<pre>');

		$players = explode(" ",$equipos);
		echo('</pre>');
		shuffle($players);
		//$players = array('A','B','C','D');
		$matchs = array();
		
			foreach($players as $k){
				foreach($players as $j){
					if($k == $j){
						continue;
					}
					$z = array($k,$j);
					sort($z);
					if(!in_array($z,$matchs)){
						$matchs[] = $z;
					}
				}
			}

			echo('<pre>');
			print_r($matchs);
			echo('</pre>');
		//print_r($players);
	}*/
	
	//listar categorias
	/*public function cargarCategorias(){
		$categorias = MEquipo::select('categoria')
								->groupBy('categoria')
								->orderBy('categoria')
								->get();
		return view('fixture/seleccionarequipo')->with('categorias',
			$categorias);

	}

	public function categorias(){
        $categoria = MEquipo::pluck('categoria','id_equipo');
        return view('fixture/seleccionarequipo')->with('categoria',$categoria);
    }

	public function listar_equipos($categoria){
		$equipos = MEquipo::select('nombre','id_equipo')
		->where('categoria',$categoria)
		->get();
		return view ('fixture/seleccionarequipo')->with('equipos',$equipos);
	}*/
	function roundRobin($equipos){// array $teams ){
		$equipos=substr($equipos,1);
		/*echo('<pre>');*/
		//echo($equipos);		
		//echo('</pre>');

		$teams = explode(" ",$equipos);
		//print_r($teams);
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
			
		return view('fixture/seleccionar_equipos');
	}

}