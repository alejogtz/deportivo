<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MDirectorT;
use Illuminate\Database\QueryException;



class DirectorController extends Controller{
    public function getTable(){
        $vertodo = MDirectorT::select('*')->orderBy('id_director')->get();
        return view('fixture/director')->with('dis',$vertodo);
    }

    public function list(Request $g){
        $gapi = $g -> id;
        return response()->json(MDirectorT::select('*')->get());
   }

   public function listDisponible(Request $g){
        $gapi = $g -> id;
        return response()->json(MDirectorT::select('*')
        ->where('elimnado','=',false)->get());
    }

   public function agregar(Request $data){
        $editar = MDirectorT::insert(['nombre'=>$data->nombre_a,'apellido_p'=>$data->apellido_p_a,'apellido_m'=>$data->apellido_m_a]);
        return back()
        ->with('success','Se ha agregado correctamente el registro.');
    }


    public function editbyid(Request $data){
        $editar = MDirectorT::find($data->id_director_e);
        $editar->nombre = $data->nombre_e;
        $editar->apellido_p = $data->apellido_p_e;
        $editar->apellido_m = $data->apellido_m_e;
        $editar->elimnado = $data->eliminado_e;
        $editar->save();
        return back()->with('success','Se ha actualizado correctamente el registro. actual');
    }

    public function eliminar(Request $data){
        try{
            MDirectorT::select('id_director')
            ->where('id_director','=',$data->id_director_d)
            ->delete();
            return back()->with('success','Se ha eliminado correctamente el registro.');
        } catch(QueryException $ex){ 
            return back()->withErrors('Es imposible borrar el registro ya que otros dependen de el.');
        }
    }

    public function listado_director($id_director){
        $al = MDirectorT::select('id_director','nombre','apellido_p','apellido_m')
		->where('id_director',$id_director)
        ->get();
        return $al;
    }
}