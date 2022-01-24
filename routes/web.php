<?php

use Illuminate\Support\Facades\Route;

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

//para loguearse


Route::post('/', 'UserController@login')->name('user.login1'); 
Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//rutas generales

Route::resource('perfil','PerfilController');
Route::resource('usuario','UserController');
 

//para entrar con diferente perfil

Route::get('/administrador', 'PerfilController@administrador');
Route::get('/docente', 'PerfilController@docente');
Route::get('/director', 'PerfilController@director');
 



//rutas index  

Route::get('/users', 'UserController@index');
Route::get('/perfiles', 'PerfilController@index');

Route::get('/asignarcursos', 'DetallecursoController@index');
Route::get('/cursos', 'CursoController@index');
 



//rutas de metodos adicionales
//Route::get('/Encuesta/{id}','EncuestaController@estado')->name('estadoencuesta');


// cancelaciones 
Route::get('cancelarPerfil', function () {
    return redirect()->route('perfil.index')->with('datos','Accion cancelada..!');
})->name('cancelarPerfil');  //le damos nombre a la ruta

Route::get('cancelarUsuario', function () {
    return redirect()->route('usuario.index')->with('datos','Accion cancelada..!');
})->name('cancelarUsuario');  //le damos nombre a la ruta
 


//rutas usadas por javascript
Route::Get('/usuarioslista', 'UserController@usuarios');