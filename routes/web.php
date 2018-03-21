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

Route::get('/', function () {
    return view('login');
})->name('index');

Route::post('login','SiteController@login')->name('login');
Route::get('logout','SiteController@logout')->name('logout');

Route::prefix('usuario')->group(function(){

  Route::get('usuarios','UsuariosController@usuarios')->name('usuario.usuarios');
  Route::get('categorias','UsuariosController@categorias')->name('usuario.categorias');
  Route::get('adicionarUsuario','UsuariosController@adicionarUsuario')->name('usuario.adicionarUsuario');
  Route::get('adicionarCategoria','UsuariosController@adicionarCategoria')->name('usuario.adicionarCategoria');

});
