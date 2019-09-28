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
    //Esta funcion index es la encargada de cargar las imagenes de todos los usuarios, lista la ultima publicacion ///publicada
    public function index(){
        $images = Imagen::orderBy('user_id','desc')->paginate(5);
        return view('user.profile',[
            'images' =>$images
        ]);
    }
    // Esta funcion es la encargada de buscar personas en el buscador
    public function usersIndex($search = null){

        if(!empty($search)){
            $users = User::where('name','LIKE','%'.$search.'%')->orWhere('email','LIKE','%'.$search.'%')->orderBy('id','desc')->paginate(5);
        }else{
        $users = User::orderBy('id','desc')->paginate(5);
        }
        return view('user.index',[
            'users' => $users
        ]);

}
    //Esta funcion redirije al usuario a la vista user.edit
    public function configuracion(){
        return view('user.edit');
    }

    //Esta funcion es la encargada de actualizar los datos del perfil del usuario
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
        // si la imagen existe
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

    /*Esta funcion lo que hace es recibir el nombre de una imagen por la url, luego para buscar la imagen solicitada por url se llama al Storge::disk de nombre users,users es el nombre del filesystem que es la que almacena todos los datos de las imagenes en los storages, luego se le otorga el nombre que se quiere buscar con el get() para hacer una especie de select, finalmente se devuelve un objeto con la info de la imagen*/
    public function obtenerImagen($filename){
        $file = Storage::disk('users')->get($filename);

        return new Response($file,200);
    }

    //funcion que redirije al perfil del usuario segun su id
    public function profile($id){
        $user = User::find($id);

        return view('user.profile',[
            'user' =>$user
        ]);
    }


}
