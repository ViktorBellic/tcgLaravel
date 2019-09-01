<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        //validacion
        $validate = $this->validate($request ,[
            'description' => 'required',
            'image_path' => 'required|image'
        ]);

        //Recogiendo datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //Asignar valores nuevo objeto
        $user = \Auth::user();
        $image = new Imagen();
        $image->user_id = $user->id;

        $image->description = $description;

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();
        return redirect()->route('image.create')->with([
            'message' => 'La foto se ha subido correctamente'
        ]);
    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id){

        $image =  Imagen::find($id);
        return view('image.detail',[
            'image' => $image
        ]);
    }
}
