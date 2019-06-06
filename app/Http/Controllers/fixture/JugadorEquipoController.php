<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MJugadorEquipo;
use Illuminate\Support\Facades\DB;
use App\Http\Models\MEquipo;

class JugadorEquipoController extends Controller{

    public function jugadoresIn($id){
        $jugadores = DB::select("select *,  date_part('year',age(fecha_nac)) as edad from jugador natural inner join jugador_equipo where id_equipo = ?", [$id]);  
        return $jugadores;
    }

    public function jugadoresNoIn($id){
        $jugadores = DB::select("select *,date_part('year',age(fecha_nac)) as edad from jugador
                                where id_jugador not in
                                (select id_jugador from jugador_equipo where id_equipo = ?)
                                and elimnado = false", [$id]); 
        return $jugadores;
    }    

    public function getTable(){
        $equipos = MEquipo::select('*')->orderBy('id_equipo')->get();
        return view('fixture/jugador_equipo')
        ->with('equipos',$equipos);
    }

    public function list(){
        return response()->json(MJugadorEquipo::select('*')->orderBy('id_equipo')->get());  
    }

    public function listJugadoresInEquipo($id){
        return response()->json($this->jugadoresIn($id));  
    }

    public function listJugadoresNotInEquipo($id){
        return response()->json($this->jugadoresNoIn($id));  
    }

    public function listEquiposDisponibles(){
        $vertodo = MEquipo::select('*')->orderBy('id_director')->get();
        return response()->json($vertodo);
    }

   public function agregar(Request $data){
        MJugadorEquipo::insert(['id_equipo'=>$data->id_equipo_a,'id_jugador'=>$data->id_jugador_a]);
        $equipos = MEquipo::select('*')->orderBy('id_director')->get();
        $equipo = MEquipo::select('*')->where('id_equipo','=',$data->id_equipo_a)->get()->first();
        return back()
        ->with('success','Se ha agregado correctamente el registro.')
        ->with('jugadoresno',$this->jugadoresNoIn($data->id_equipo_a))
        ->with('jugadores',$this->jugadoresIn($data->id_equipo_a))
        ->with('equipo',$equipo)
        ->with('equipos',$equipos);
        return response()->json($equipo);
    }

    public function eliminar(Request $data){
        MJugadorEquipo::select('id_director')
        ->where([
            ['id_equipo','=',$data->id_equipo_d],
            ['id_jugador','=',$data->id_jugador_d],
            ])
        ->delete();
        $equipos = MEquipo::select('*')->orderBy('id_director')->get();
        $equipo = MEquipo::select('*')->where('id_equipo','=',$data->id_equipo_d)->get()->first();
        return back()
        ->with('success','Se ha eliminado correctamente el registro.')
        ->with('jugadoresno',$this->jugadoresNoIn($data->id_equipo_d))
        ->with('jugadores',$this->jugadoresIn($data->id_equipo_d))
        ->with('equipo',$equipo)
        ->with('equipos',$equipos);
        return response()->json($equipo);
    }
}