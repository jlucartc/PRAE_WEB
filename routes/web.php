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
  Route::get('adicionarCompromisso/{id}','UsuariosController@adicionarCompromisso')->name('usuario.adicionarCompromisso');
  Route::get('adicionarDivisao/{id}','UsuariosController@adicionarDivisao')->name('usuario.adicionarDivisao');
  Route::get('adicionarMapa/{id}','UsuariosController@adicionarMapa')->name('usuario.adicionarMapa');
  Route::post('confirmarCadastroUsuario','UsuariosController@confirmarCadastroUsuario')->name('usuario.confirmarCadastroUsuario');
  Route::post('confirmarCadastroCategoria','UsuariosController@confirmarCadastroCategoria')->name('usuario.confirmarCadastroCategoria');
  Route::post('confirmarCadastroDescricao','UsuariosController@confirmarCadastroDescricao')->name('usuario.confirmarCadastroDescricao');
  Route::post('confirmarCadastroDocumento','UsuariosController@confirmarCadastroDocumento')->name('usuario.confirmarCadastroDocumento');
  Route::get('verUsuario/{id}','UsuariosController@verUsuario')->name('usuario.verUsuario');
  Route::get('verCategoria/{id}','UsuariosController@verCategoria')->name('usuario.verCategoria');
  Route::get('verDescricao/{id}','UsuariosController@verDescricao')->name('usuario.verDescricao');
  Route::get('verCoordenadoria/{id}','UsuariosController@verCoordenadoria')->name('usuario.verCoordenadoria');
  Route::get('verCompromisso/{id}','UsuariosController@verCompromisso')->name('usuario.verCompromisso');
  Route::get('verDivisao/{id}','UsuariosController@verDivisao')->name('usuario.verDivisao');
  Route::post('deletarUsuario','UsuariosController@deletarUsuario')->name('usuario.deletarUsuario');
  Route::post('deletarCategoria','UsuariosController@deletarCategoria')->name('usuario.deletarCategoria');
  Route::post('deletarDescricao','UsuariosController@deletarDescricao')->name('usuario.deletarDescricao');
  Route::post('deletarDocumento','UsuariosController@deletarDocumento')->name('usuario.deletarDocumento');
  Route::post('deletarCoordenadoria','UsuariosController@deletarCoordenadoria')->name('usuario.deletarCoordenadoria');
  Route::post('deletarCompromisso',"UsuariosController@deletarCompromisso")->name("usuario.deletarCompromisso");
  Route::post('deletarDivisao',"UsuariosController@deletarDivisao")->name("usuario.deletarDivisao");
  Route::post('deletarMapa','UsuariosController@deletarMapa')->name('usuario.deletarMapa');
  Route::post('salvarUsuario','UsuariosController@salvarUsuario')->name('usuario.salvarUsuario');
  Route::post('salvarCategoria','UsuariosController@salvarCategoria')->name('usuario.salvarCategoria');
  Route::post('salvarCoordenadoria','UsuariosController@salvarCoordenadoria')->name('usuario.salvarCoordenadoria');
  Route::post('salvarDescricao','UsuariosController@salvarDescricao')->name('usuario.salvarDescricao');
  Route::post('salvarCompromisso','UsuariosController@salvarCompromisso')->name('usuario.salvarCompromisso');
  Route::post('salvarDivisao','UsuariosController@salvarDivisao')->name('usuario.salvarDivisao');
  Route::get('baixarDocumento/{id}','UsuariosController@baixarDocumento')->name('usuario.baixarDocumento');
  Route::get('coordenadorias','UsuariosController@coordenadorias')->name('usuario.coordenadorias');
  Route::get('adicionarCoordenadoria','UsuariosController@adicionarCoordenadoria')->name('usuario.adicionarCoordenadoria');
  Route::post('confirmarCadastroCoordenadoria','UsuariosController@confirmarCadastroCoordenadoria')->name('usuario.confirmarCadastroCoordenadoria');
  Route::post('confirmarCadastroCompromisso','UsuariosController@confirmarCadastroCompromisso')->name('usuario.confirmarCadastroCompromisso');
  Route::post('confirmarCadastroDivisao','UsuariosController@confirmarCadastroDivisao')->name('usuario.confirmarCadastroDivisao');
  Route::post('confirmarCadastroMapa','UsuariosController@confirmarCadastroMapa')->name('usuario.confirmarCadastroMapa');
  Route::get('baixarMapa/{id}','UsuariosController@baixarMapa')->name('usuario.baixarMapa');


});

Route::get('app/ws/listaCategorias','UsuariosController@listaCategoriasAppWS')->middleware('CORS')->name('usuario.listaCategoriasAppWS');
Route::get('app/ws/categoria/{id}','UsuariosController@categoriaAppWS')->middleware('CORS')->name('usuario.categoriaAppWS');

Route::post('app/ws/baixarDocumento','UsuariosController@salvarDescricao')->middleware('CORS')->name('usuario.baixarDocumentoAppWS');
