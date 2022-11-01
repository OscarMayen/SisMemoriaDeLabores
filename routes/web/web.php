<?php

use Illuminate\Support\Facades\Route;
use admin\UsuarioController;
use admin\RoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Administracion de usuarios y roles
//ejemplo de ruta protegida
//Route::resource('/usuarios', UsuarioController::class)->middleware('can:admin.usuarios')->names('admin.usuarios');
Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('tipoActividad', 'TipoActividadController')->names('tipoActividad');
Route::resource('actividad', 'ActividadController')->names('actividad');
//Facultad
Route::get('guardarFormFacultad', 'FacultadController@verFormFacultad')->name('formFacultad');
Route::post('saveFacultad', 'FacultadController@guardarFacultad')->name('saveFacultad');
Route::get('listarFacultad', 'FacultadController@mostrarFacultades')->name('listFacultad');
Route::delete('eliminarFacultad/{id}','FacultadController@eliminarFacultad')->name('deleteFacultad');
Route::get('editarFormFacultad/{id}','FacultadController@actualizarFacultad')->name('editFormFacultad');
Route::patch('editarFacultad/{id}','FacultadController@editarFacultad')->name('editFacultad');

//Escuela
Route::get('guardarFormEscuela', 'EscuelaController@verFormEscuela')->name('formEscuela');
Route::post('saveEscuela', 'EscuelaController@guardarEscuela')->name('saveEscuela');
Route::get('listarEscuela', 'EscuelaController@mostrarEscuelas')->name('listEscuela');
Route::delete('eliminarEscuela/{id}','EscuelaController@eliminarEscuela')->name('deleteEscuela');
Route::get('editarFormEscuela/{id}','EscuelaController@actualizarEscuela')->name('editFormEscuela');
Route::patch('editarEscuela/{id}','EscuelaController@editarEscuela')->name('editEscuela');
 