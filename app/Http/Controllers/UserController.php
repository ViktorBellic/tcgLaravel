<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Imagen;

class UserController extends Controller
{
    //No autorizar usuarios no logoeados
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $images = Imagen::orderBy('user_id')->get();


        return view('Profile.profile',[
            'images' =>$images
        ]);
    }


    public function configuracion(){
        return view('Profile.edit');
    }


    public function update(Request $request){

        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        // Validacion del Formulario
      /*  $validacion = $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',

        ]);*/

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

        // Ejecutar consulta y cambios en la base de datos

        $user->update();
        return redirect()->route('edit')
                         ->with(['message'=>'Usuario actualizado Correctamente']);
    }

    public function obtenerImagen($filename){
        $file = Storage::disk('users')->get($filename);

        return new Response($file,200);
    }
    /*
    public function obtenerImagenGellery($filename2){
        $file2 = Storage::disk('images')->get($filename2);

        return new Response($file2,200);
    }*/
}
