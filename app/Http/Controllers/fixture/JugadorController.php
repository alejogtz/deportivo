<?php

namespace App\Http\Controllers\fixture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\MJugador;
use Illuminate\Support\Facades\File;


class JugadorController extends Controller{
    public function getTable(){
        $vertodo = MJugador::select('*')->orderBy('id_jugador')->get();
        return view('fixture/jugador')->with('dis',$vertodo);
    }

    public function list(Request $g){
        $gapi = $g -> id;
        return response()->json(MJugador::select('*')->get());
   }

   
    public function agregar(Request $request){
        $new_name = '';
        if($request->foto != null){
            $request->validate([
                'foto'  =>  'image|max:2048'
            ]);
            $image = $request->file('foto');
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images_jugador'),$new_name);
        }
        MJugador::insert([
            'nombre'=>$request->nombre,
            'apellido_p'=>$request->apellido_p,
            'apellido_m'=>$request->apellido_m,
            'no_playera'=>$request->no_playera,
            'estatura'=>$request->estatura,
            'posicion' => $request->posicion,
            'fecha_nac'=>$request->fecha_nac,
            'sexo'=>$request->sexo,
            'foto'=>$new_name
        ]);
        return back()
        ->with('success','Se ha agregado correctamente el registro.');
    }


    public function editbyid(Request $data){
        $fotodb = MJugador::find($data->id_jugador);
        if($data->foto_edit != null){
            $data->validate([
                'foto_edit'  =>  'image|max:2048'
            ]);
            $image = $data->file('foto_edit');
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images_jugador'),$new_name);
                       
            $image_path = $fotodb->foto;  
            if(File::exists(public_path('assets/images_jugador/').$image_path)) {
                File::delete(public_path('assets/images_jugador/').$image_path);
            }
            $data->foto_edit = $new_name;
        }
        else{
            $data->foto_edit = $fotodb->foto;
        }

        $editar = MJugador::select('nombre','apellido_p','apellido_m','no_playera','estatura','fecha_nac','foto','elimnado')
        ->where('id_jugador','=',$data->id_jugador)
        ->update([
            'nombre'=>$data->nombre,
            'apellido_p'=>$data->apellido_p,
            'apellido_m'=>$data->apellido_m,
            'no_playera'=>$data->no_playera,
            'estatura'=>$data->estatura,
            'fecha_nac'=>$data->fecha_nac,
            'foto'=>$data->foto_edit,
            'elimnado'=>$data->eliminado
            ]);
        return back()->with('success','Se ha actualizado correctamente el registro.');
    }

    public function eliminar(Request $data){
        $editar = MJugador::find($data->id_jugador);
        $image_path = $editar->foto;  
        if(File::exists(public_path('assets/images_jugador/').$image_path)) {
            File::delete(public_path('assets/images_jugador/').$image_path);
        }
        $editar->delete();
        return back()->with('success','Se ha eliminado correctamente el registro.');
    }

}