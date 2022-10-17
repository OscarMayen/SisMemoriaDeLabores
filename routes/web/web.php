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