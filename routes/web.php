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
Route::resource('detallecurso','DetallecursoController');
Route::resource('detalleaula','DetalleaulaController');
Route::resource('cargahoraria','CargahorariaController');



//para entrar con diferente perfil

Route::get('/administrador', 'PerfilController@administrador');
Route::get('/docente', 'PerfilController@docente');
Route::get('/director', 'PerfilController@director');
 



//rutas index  

Route::get('/users', 'UserController@index');
Route::get('/perfiles', 'PerfilController@index');

Route::get('/asignarcursos', 'DetallecursoController@index');
Route::get('/asignaraulas', 'DetalleaulaController@index');
Route::get('/horario', 'DetallecursoController@semestres');
Route::get('/cursos', 'CursoController@index');

Route::get('/cargahorariadocente', 'CargahorariaController@index');

Route::get('/cargahorario/{id}', 'CargahorariaController@cargahorario')->name('cargahorario');


//rutas de metodos adicionales
 
Route::get('/horariosemanal/{id}','DetalleCursoController@horariosemanal')->name('horariosemanal');
Route::get('/cargahorariadeclaracion/{id}','DetalleCursoController@cargahorariadeclaracion')->name('cargahorariadeclaracion');
Route::get('/declaracionjurada1/{id}','DetalleCursoController@declaracionjurada1')->name('declaracionjurada1');
Route::get('/declaracionjurada2/{id}','DetalleCursoController@declaracionjurada2')->name('declaracionjurada2');

Route::get('/asignaraula/{id}','CargahorariaController@asignaraula')->name('asignaraula');
Route::post('/store2','DetalleaulaController@store2')->name('store2');

Route::get('/declaracioncargahoraria/{id}','DetalleCursoController@declaracioncargahoraria')->name('declaracioncargahoraria');

// cancelaciones 
Route::get('cancelarPerfil', function () {
    return redirect()->route('perfil.index')->with('datos','Accion cancelada..!');
})->name('cancelarPerfil');  //le damos nombre a la ruta

Route::get('cancelarUsuario', function () {
    return redirect()->route('usuario.index')->with('datos','Accion cancelada..!');
})->name('cancelarUsuario');  //le damos nombre a la ruta
 


//rutas de cancelacion
Route::get('cancelarDetalleCursos', function () {
    return redirect()->route('detallecurso.index')->with('datos','Accion cancelada..!');
})->name('cancelarDetalleCursos');  //le damos nombre a la ruta

Route::get('cancelarDetalleAulas', function () {
    return redirect()->route('detalleaula.index')->with('datos','Accion cancelada..!');
})->name('cancelarDetalleAulas');  //le damos nombre a la ruta
 
Route::get('cancelarcarga', function () {
    return redirect()->route('cargahoraria.index')->with('datos','Accion cancelada..!');
})->name('cancelarcarga');  //le damos nombre a la ruta
 

//rutas usadas por javascript
Route::Get('/usuarioslista', 'UserController@usuarios');