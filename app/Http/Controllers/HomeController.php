<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $images = Imagen::orderBy('user_id', 'desc')->get();


        return view('Profile.profile',[
            'images' =>$images
        ]);


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
