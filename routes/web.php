<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//==================RECORDAR PONER AUTENTICACION A LAS RUTAS

use App\Imagen;

Route::get('/', function () {
    return view('inicio');
});
Route::get('/home', function () {
    return view('home.inicio');
});

/*
Route::resource('products','ProductController');
Route::resource('user','UsuarioController');
Route::resource('user','UserController');
*/
Auth::routes();

//Ruta para cargar pubicaciones en perfil de usuario... creo que lo voy a sacar
Route::get('/profile','UserController@index');
//Ruta para cargar imagenes en el inicio
 Route::get('/home','HomeController@index')->name('homeUser');
//ruta para editar perfil
Route::get('/edit','UserController@configuracion')->name('edit');
Route::post('/actualizar','UserController@update')->name('actualizar');

//Ruta para subir imagen
Route::get('/image/{filename}','UserController@obtenerImagen')->name('obtenerImagen');

//Ruta subir imagen
Route::get('/subir-imagen','ImageController@create')->name('image.create');
Route::post('/image/save','ImageController@save')->name('image.save');
//Ruta para obtener imagen
Route::get('/image/file/{filename}','ImageController@getImage')->name('image.file');
Route::get('/imagen/{id}','ImageController@detail')->name('image.detail');
//Ruta para los comentarios
Route::post('/comment/save','CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}','CommentController@delete')->name('comment.delete');
//Ruta para Likes
Route::get('/like/{image_id}','LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}','LikeController@dislike')->name('like.delete');
Route::get('/likes','LikeController@index')->name('likes');

Route::get('/perfil/{id}','UserController@profile')->name('profile');

//Ruta para eliminar imagen de una publicación si el usuario es dueño de la misma
Route::get('/imagen/delete/{id}','ImageController@delete')->name('image.delete');
//Rutas para la edición de una foto
Route::get('/imagen_editar/{id}','ImageController@edit')->name('image.edit');
Route::post('/image/update','ImageController@update')->name('image.update');

//ruta buscador de usuarios
Route::get('/gente/{search?}','UserController@usersIndex')->name('users.index');
