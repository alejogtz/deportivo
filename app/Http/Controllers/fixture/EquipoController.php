<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MEquipo;
use App\Http\Models\MDirectorT;
use Illuminate\Database\QueryException;


class EquipoController extends Controller{

    public function getTable(){
        $vertodo = MEquipo::select('*')->orderBy('id_director')->get();
        foreach ($vertodo as $valor) {
            $id = $valor->id_director;
            $directort = MDirectorT::find($id);
            $valor->id_director = MDirectorT::find($id);
        }
        //return response()->json($vertodo);
        return view('fixture/equipo')->with('dis',$vertodo);
    }

    public function list(){
        $vertodo = MEquipo::select('*')->orderBy('id_director')->get();
        foreach ($vertodo as $valor) {
            $id = $valor->id_director;
            $directort = MDirectorT::find($id);
            $valor->id_director = MDirectorT::find($id);
        }
        return response()->json($vertodo);
    }

   public function agregar(Request $data){
        $editar = MEquipo::insert([
            'id_director'=>$data->id_director_a,
            'nombre'=>$data->nombre_a,
            'fecha_inscripcion'=>$data->fecha_inscripcion_a,
            'lugar_procedencia'=>$data->lugar_procedencia_a,
            'categoria'=>$data->categoria
            ]);
        return back()
        ->with('success','Se ha agregado correctamente el registro.');
    }


    public function editbyid(Request $data){
        $editar = MEquipo::find($data->id_equipo_e);
        $editar->id_director = $data->id_director_e;
        $editar->nombre = $data->nombre_e;
        $editar->fecha_inscripcion = $data->fecha_inscripcion_e;
        $editar->lugar_procedencia = $data->lugar_procedencia_e;
        $editar->elimnado = $data->eliminado_e;
        $editar->categoria = $data->categoria_e;
        $editar->save();
        return back()->with('success','Se ha actualizado correctamente el registro. actual');
    }

    public function eliminar(Request $data){
        try{
            MEquipo::select('id_equipo')
            ->where('id_equipo','=',$data->id_equipo_d)
            ->delete();
            return back()->with('success','Se ha eliminado correctamente el registro.');
        } catch(QueryException $ex){ 
            return back()->withErrors('Es imposible borrar el registro ya que otros dependen de el.');
        }
    }
}