<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';


    public function usuario(){
        return $this->belongsTo('App\User','user_id'); // Para relacionar
    }

    public function image(){
        return $this->belongsTo('App\Imagen','image_id'); // Para relacionar
    }
}
