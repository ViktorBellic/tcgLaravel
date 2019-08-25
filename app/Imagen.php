<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagens';

    public function commnents(){
        return $this->hasMany('App\Comment');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    // Relacion muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id'); // Para relacionar
    }
}
