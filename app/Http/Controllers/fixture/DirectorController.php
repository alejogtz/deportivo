<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MDirectorT;


class DirectorController extends Controller{
    public function getTableDirector(){
        $vertodo = MDirectorT::select('*')->get();
        return view('fixture/director')->with('dis',$vertodo);
    }

    public function list(Request $g){
        $gapi = $g -> id;
        return response()->json(MDirectorT::select('*')->get());
   }


   public function editbyid(Request $data)
    {
        $editar = MDirectorT::find($data->id_director);

        $editar->nombre = $data->nombre;
        $editar->apellido_p = $data->apellido_p;
        $editar->apellido_m = $data->apellido_m;
        $editar->eliminado = $data->eliminado;

        $editar->save();

        return redirect()->to('/director/registros');
    }

    public function editbyid2(Request $data)
    {
        print "pito";
        /*
        $editar = MDirectorT::where('id_director',$data->id_director)->take(1)->first();

        $editar->nombre = $data->nombre;
        $editar->apellido_p = $data->apellido_p;
        $editar->apellido_m = $data->apellido_m;
        $editar->eliminado = $data->eliminado;

        $editar->save();

        response()->json(['mensaje' => 'Actualizo Correctamente']);*/
    }

    public function listado_director($id_director){
        $al = MDirectorT::/*where('id_director',$id_director)
        ->pluck('nombre','apellido_p','apellido_m','id_director');*/select('nombre','apellido_p','apellido_m')
		->where('id_director',$id_director)
        ->get();
        return $al;
    }
}