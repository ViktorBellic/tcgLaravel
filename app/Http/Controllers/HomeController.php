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

    public function index(){
        $images = Imagen::orderBy('user_id','desc')->paginate(5);

        return view('home',[
            'images' =>$images
        ]);
    }

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
