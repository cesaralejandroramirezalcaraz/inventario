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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verificar_perfil', 'AccesoController@index');
//capturista
Route::get('/registro', 'CapturistaController@index');
Route::post('/producto_alta', 'CapturistaController@created')->name('producto_alta');
//gestor
Route::get('/bandeja', 'GestorController@index');
Route::post('/eliminar', 'GestorController@delete')->name('eliminar');
Route::post('/editar', 'GestorController@update')->name('editar');
//administrador
Route::get('/reportes', 'AdministradorController@index');
Route::get('/reportes/descarga/masiva','AdministradorController@masivo')->name('masivo');
Route::post('/reportes/descarga/fecha','AdministradorController@fecha')->name('fecha');
Route::get('/bandejaAdmin','AdministradorController@adminbandeja');
Route::post('/delete','AdministradorController@delete')->name('delete');
Route::post('/edit', 'AdministradorController@update')->name('edit');
Route::get('/registroAdmin', 'AdministradorController@adminregistro');
Route::post('/alta','AdministradorController@created')->name('producto_admin_alta');



