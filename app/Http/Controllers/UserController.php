<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Imagen;
use App\User;
class UserController extends Controller
{
    //No autorizar usuarios no logoeados
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $images = Imagen::orderBy('user_id','desc')->paginate(5);
        return view('user.profile',[
            'images' =>$images
        ]);
    }

    public function configuracion(){
        return view('user.edit');
    }

    public function update(Request $request){
        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        // Recoger datos del formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->email = $email;

        // Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path){
            // Colocar nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            // Guardar en la carpeta storage
            Storage::disk('users')->put($image_path_name,File::get($image_path));

            //Setear el nombre al objeto
            $user->image= $image_path_name;
        }

        // Ejecutar consulta y cambios en la base de datos para editar el perfil
        $user->update();
        return redirect()->route('edit')
                         ->with(['message'=>'Usuario actualizado Correctamente']);
    }

    public function obtenerImagen($filename){
        $file = Storage::disk('users')->get($filename);

        return new Response($file,200);
    }

    public function profile($id){
        $user = User::find($id);

        return view('user.profile',[
            'user' =>$user
        ]);
    }
}
