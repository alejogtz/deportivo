<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MTorneo;
use Illuminate\Database\QueryException;



class TorneoController extends Controller{
    public function getTable(){
        $vertodo = MTorneo::select('*')->orderBy('id_torneo')->get();
        return view('fixture/torneo')->with('dis',$vertodo);
    }

    public function list(Request $g){
        $gapi = $g -> id;
        return response()->json(MTorneo::select('*')->get());
   }

   public function listDisponible(Request $g){
        $gapi = $g -> id;
        return response()->json(MTorneo::select('*')
        ->where('elimnado','=',false)->get());
    }

   public function agregar(Request $data){
        $editar = MTorneo::insert([
            'nombre'=>$data->nombre_a,
            'categoria'=>$data->categoria_a,
            'fecha_inaguracion'=>$data->fecha_inaguracion_a,
            'fecha_termino'=>$data->fecha_termino_a,
            'categoria'=>$data->categoria_a
            ]);
        return back()
        ->with('success','Se ha agregado correctamente el registro.');
    }


    public function editbyid(Request $data){
        $editar = MTorneo::find($data->id_torneo_e);
        $editar->nombre = $data->nombre_e;
        $editar->categoria = $data->categoria_e;
        $editar->fecha_inaguracion = $data->fecha_inaguracion_e;
        $editar->fecha_termino = $data->fecha_termino_e;
        $editar->elimnado = $data->eliminado;
        $editar->save();
        return back()->with('success','Se ha actualizado correctamente el registro. actual');
    }

    public function eliminar(Request $data){
        try{
            $editar = MTorneo::select('id_torneo')
            ->where('id_torneo','=',$data->id_torneo_d)
            ->delete();
            return back()->with('success','Se ha eliminado correctamente el registro.');
        } catch(QueryException $ex){ 
            return back()->withErrors('Es imposible borrar el registro ya que otros dependen de el.');
        }
    }

    public function listado_torneos(){
        $date1 = date("Y-m-d"); 
        $al = MTorneo::select('id_torneo','nombre','categoria','fecha_inaguracion','fecha_termino','elimnado')
        ->where('fecha_termino','>=',$date1)->where('elimnado','=','false')
        // >=current_date//where('categoria',$categoria)
        ->get();
        return $al;
    }
}