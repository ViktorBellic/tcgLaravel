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

/*
Route::resource('products','ProductController');
Route::resource('user','UsuarioController');
Route::resource('user','UserController');

Auth::routes();

Route::get('/profile','UserController@index');
//Route::get('/profile','HomeController@index');

Route::get('/edit','UserController@configuracion')->name('edit'); //ruta para editar perfil
/*
//Route::get('/home', 'HomeController@index')->name('home');

;*/
Route::post('/actualizar','UserController@update')->name('actualizar');
Route::get('/image/{filename}','UserController@obtenerImagen')->name('obtenerImagen'); //Ruta para subir imagen
//Ruta subir imagen
Route::get('/subir-imagen','ImageController@create')->name('image.create');
Route::post('/image/save','ImageController@save')->name('image.save');


Route::get('/image/file/{filename}','ImageController@getImage')->name('image.file');
Route::get('/imagen/{id}','ImageController@detail')->name('image.detail');

Route::post('/comment/save','CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}','CommentController@delete')->name('comment.delete');



Route::get('/perfil/{id}','UserController@profile')->name('profile');



