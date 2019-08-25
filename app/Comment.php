<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';


    public function usuario(){
        return $this->belognsTo('App\User','user_id'); // Para relacionar
    }

    public function image(){
        return $this->belognsTo('App\Imagen','image_id'); // Para relacionar
    }
}
