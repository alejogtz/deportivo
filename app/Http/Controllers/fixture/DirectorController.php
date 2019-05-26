<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MDirectorT;


class DirectorController extends Controller{
    public function getTableDirector(){
        $vertodo = MDirectorT::select('*')->orderBy('id_director')->get();
        return view('fixture/director')->with('dis',$vertodo);
    }

    public function list(Request $g){
        $gapi = $g -> id;
        return response()->json(MDirectorT::select('*')->get());
   }

   public function agregar(Request $data){
        $editar = MDirectorT::insert(['nombre'=>$data->nombre,'apellido_p'=>$data->apellido_p,'apellido_m'=>$data->apellido_m]);
        return redirect()->to('/director/registros');
    }


    public function editbyid(Request $data){
        $editar = MDirectorT::select('nombre','apellido_p','apellido_m','elimnado')
        ->where('id_director','=',$data->id_director)
        ->update(['nombre'=>$data->nombre,'apellido_p'=>$data->apellido_p,'apellido_m'=>$data->apellido_m,'elimnado'=>$data->eliminado]);
        return redirect()->to('/director/registros');
    }

    public function eliminar(Request $data){
        $editar = MDirectorT::select('id_director')
        ->where('id_director','=',$data->id_director)
        ->delete();
        return redirect()->to('/director/registros');
    }
}