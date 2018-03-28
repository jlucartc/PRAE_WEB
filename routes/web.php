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
})->middleware('redirectUsuario')->name('index');

Route::post('login','SiteController@login')->name('login');
Route::get('logout','SiteController@logout')->name('logout');

Route::prefix('usuario')->middleware('redirectLogin')->group(function(){

  Route::get('usuarios','UsuariosController@usuarios')->name('usuario.usuarios');
  Route::get('categorias','UsuariosController@categorias')->name('usuario.categorias');
  Route::get('adicionarUsuario','UsuariosController@adicionarUsuario')->name('usuario.adicionarUsuario');
  Route::get('adicionarCategoria','UsuariosController@adicionarCategoria')->name('usuario.adicionarCategoria');
  Route::get('adicionarDescricao/{id}','UsuariosController@adicionarDescricao')->name('usuario.adicionarDescricao');
  Route::get('adicionarDocumento/{id}','UsuariosController@adicionarDocumento')->name('usuario.adicionarDocumento');
  Route::post('confirmarCadastroUsuario','UsuariosController@confirmarCadastroUsuario')->name('usuario.confirmarCadastroUsuario');
  Route::post('confirmarCadastroCategoria','UsuariosController@confirmarCadastroCategoria')->name('usuario.confirmarCadastroCategoria');
  Route::post('confirmarCadastroDescricao','UsuariosController@confirmarCadastroDescricao')->name('usuario.confirmarCadastroDescricao');
  Route::post('confirmarCadastroDocumento','UsuariosController@confirmarCadastroDocumento')->name('usuario.confirmarCadastroDocumento');
  Route::get('verUsuario/{id}','UsuariosController@verUsuario')->name('usuario.verUsuario');
  Route::get('verCategoria/{id}','UsuariosController@verCategoria')->name('usuario.verCategoria');
  Route::get('verDescricao/{id}','UsuariosController@verDescricao')->name('usuario.verDescricao');
  Route::post('deletarUsuario','UsuariosController@deletarUsuario')->name('usuario.deletarUsuario');
  Route::post('deletarCategoria','UsuariosController@deletarCategoria')->name('usuario.deletarCategoria');
  Route::post('deletarDescricao','UsuariosController@deletarDescricao')->name('usuario.deletarDescricao');
  Route::post('deletarDocumento','UsuariosController@deletarDocumento')->name('usuario.deletarDocumento');
  Route::post('salvarUsuario','UsuariosController@salvarUsuario')->name('usuario.salvarUsuario');
  Route::post('salvarCategoria','UsuariosController@salvarCategoria')->name('usuario.salvarCategoria');
  Route::post('salvarDescricao','UsuariosController@salvarDescricao')->name('usuario.salvarDescricao');

  Route::get('baixarDocumento/{id}','UsuariosController@baixarDocumento')->name('usuario.baixarDocumento');

});
