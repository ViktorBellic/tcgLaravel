<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Imagen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Esta funcion carga todas los post de los usuarios en la vista home.home
    public function index(){
        $images = Imagen::orderBy('user_id','desc')->paginate(5);

        return view('home.home',[
            'images' =>$images
        ]);
    }

    /*Esta funcion lo que hace es recibir el nombre de una imagen por la url, luego para buscar la imagen solicitada por url se llama al Storge::disk de nombre users,users es el nombre del filesystem que es la que almacena todos los datos de las imagenes en los storages, luego se le otorga el nombre que se quiere buscar con el get() para hacer una especie de select, finalmente se devuelve un objeto con la info de la imagen*/
    public function obtenerImagen($filename){
        $file = Storage::disk('users')->get($filename);

        return new Response($file,200);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 /*   public function index()
    {
        return view('Profile/profile');
    }*/
}
