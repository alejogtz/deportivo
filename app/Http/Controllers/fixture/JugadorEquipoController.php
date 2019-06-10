<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MJugadorEquipo;
use Illuminate\Support\Facades\DB;
use App\Http\Models\MEquipo;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class JugadorEquipoController extends Controller{

    
    public function jugadoresIn($id){
        $jugadores = DB::select("select id_jugador, (nombre || ' ' || apellido_p || ' ' || apellido_m) as nombre, 
                                no_playera, estatura, posicion, sexo, (id_jugador || ',' || id_equipo) as j_e,
                                date_part('year',age(fecha_nac)) as edad 
                                from jugador natural inner join jugador_equipo where id_equipo = ?", [$id]);  
        return $jugadores;
    }

    public function jugadoresNoIn($id){
        if($id!=0){
            $jugadores = DB::select("select id_jugador, (nombre || ' ' || apellido_p || ' ' || apellido_m) as nombre, 
                                no_playera, estatura, posicion, sexo, (id_jugador || ',' || ?) as j_e,
                                date_part('year',age(fecha_nac)) as edad from jugador
                                where id_jugador not in
                                (select id_jugador from jugador_equipo where id_equipo = ?)
                                and elimnado = false", [$id,$id]); 
        }else{
            $jugadores = DB::select("select id_jugador, (nombre || ' ' || apellido_p || ' ' || apellido_m) as nombre, 
                                    no_playera, estatura, posicion, sexo, (id_jugador || ',' || id_equipo) as j_e,
                                    date_part('year',age(fecha_nac)) as edad, id_equipo
                                    from jugador natural inner join jugador_equipo 
                                    where id_equipo = -1");
        }
        
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
    
    
    public function listJugadoresInEquipoTable($id){
        return DataTables::of(
            $this->jugadoresIn($id))
            ->addColumn('action', function($data){
                $button = $button = '<a onclick="deleteDeEquipo('.$data->j_e.')" href="#deleteDeEquipo" class="delete" data-toggle="modal">
                <i class="material-icons text-danger" data-toggle="tooltip" title="Remover">remove_circle</i></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function listJugadoresNotInEquipoTable($id){
        return DataTables::of($this->jugadoresNoIn($id))
        ->addColumn('action', function($data){
            $button = $button = '<a onclick="agregarAlEquipo('.$data->j_e.')" href="#agregarAlEquipo" class="delete" data-toggle="modal">
            <i class="material-icons text-success" data-toggle="tooltip" title="Agregar">add_circle</i></a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
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
        try{
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
        } catch(QueryException $ex){ 
            return back()
            ->with('jugadoresno',$this->jugadoresNoIn($data->id_equipo_d))
            ->with('jugadores',$this->jugadoresIn($data->id_equipo_d))
            ->with('equipo',$equipo)
            ->with('equipos',$equipos)
            ->withErrors('Es imposible borrar el registro ya que otros dependen de el.');
        }
    }
}