<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagens';

    public function comments(){
        return $this->hasMany('App\Comment','image_id')->orderBy('id','desc');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    // Relacion muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id'); // Para relacionar
    }
}
