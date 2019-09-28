<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //funcion que envia a la vista image.create para listar imagenes
    public function create(){
        return view('image.create');
    }
    //metoodo que se encarga de subir imagenes
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

        $image->save();//este metodo realiza el insert en la BD
        //este return nos redirije a la vista image.create, con un mensaje de confirmación de la subida
        return redirect()->route('image.create')->with([
            'message' => 'La foto se ha subido correctamente'
        ]);
    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    //funcion que permite abrir un post de una imagen y ver los comentarios dentro de ella
    public function detail($id){

        $image =  Imagen::find($id);
        return view('image.detail',[
            'image' => $image
        ]);
    }

    //funcion que se encarga de eliminar una imagen cuando abrimos el post
    public function delete($id){
        $user = \Auth::user(); //aqui se identifica el usuario logeado, por ende su id y todo sus atributos
        $image = Imagen::find($id); // aqui se busca la id de la imagen enviada por url
        $comments = Comment::where('image_id', $id)->get(); //aqui se busca el comentario que tiene l img
        $likes = Like::where('image_id', $id)->get();// aqui se buscan todos los likes asociados a la img

        /*el siguiente if funciona de la siguiente manera, si el usuario y la imagen existen, y ademas si la imagen cuyo id del usuariio que tiene por atributo es igual al id del usuario autentificado en al sesion se eliminaran toda la info por que cumplio con las condiciones*/
        if($user && $image && $image->user->id == $user->id){

            /*Eliminar comentarios, basicamente recorremos todos los comentarios existentes y los elimimos uno en uno*/
            if($comments && count($comments)>=1){
                foreach($comments as $comment){
                    $comment->delete();

                }
            }
            //Eliminar likes, y lo mismo que los comentarios
            if($likes && count($likes)>=1){
                foreach($likes as $like){
                    $like->delete();

                }
            }
            //Eliminar ficheros de imagen
            Storage::disk('images')->delete($image->image_path);

            //Eliminar registro de la imagen
            $image->delete();
            $message = array('message' => 'La imagen se ha borrado correctamente');
        }else{
            $message = array('message' => 'La imagen no se ha borrado');
        }
        return redirect()->route('homeUser')->with($message);

    }

    //Funcion que se encarga de editar una imagen y su info
    public function edit($id){
        $user = \Auth::user(); //aqui se identifica el usuario logeado, por ende su id y todo sus atributos
        $image = Imagen::find($id); // aqui se busca la id de la imagen enviada por url
        //la siguiente condicion funciona de la misma manera que la de la funcion delete
        if($user && $image && $image->user->id == $user->id){
            return view('image.edit',[
                'image' => $image
            ]);
        }else{
            return redirect()->route('homeUser');
        }
    }

    public function update(Request $request){

        $validate = $this->validate($request ,[
            'description' => 'required',
            'image_path' => 'image'
        ]);
            //recoger datos
        $image_id =  $request->input('image_id');
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //Coseguir objeto image
        $image = Imagen::find($image_id);
        $image->description = $description;


        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }
        //Actualizar registro
        $image->update();

        return redirect()->route('image.detail',['id'=>$image_id])->with(['message' =>'Imagen actualziada con exito']);

    }
}
