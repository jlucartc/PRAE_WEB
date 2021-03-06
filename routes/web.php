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

/* Rotas da página inicial, login e logout */

Route::get('/', function () {
    return view('login');
})->middleware('redirectUsuario')->name('index');

Route::post('login','SiteExternoController@login')->name('login');
Route::get('logout','SiteExternoController@logout')->name('logout');
Route::get('aplicativo/download','SiteExternoController@aplicativoDownload')->name('app.download');
Route::post('aplicativo/download/apk','SiteExternoController@aplicativoDownloadApk')->name('app.download.apk');

/* Rotas do sistema */

Route::prefix('sistema')->middleware('redirectLogin')->group(function(){

  /// Páginas principais

  /*Route::get('coordenadorias','SistemaController@coordenadorias')->name('sistema.coordenadorias');*/
  Route::get('usuarios','SistemaController@usuarios')->name('sistema.usuarios');
  Route::get('bolsas','SistemaController@bolsas')->name('sistema.bolsas');
  Route::get('auxilios','SistemaController@auxilios')->name('sistema.auxilios');
  Route::get('servicos','SistemaController@servicos')->name('sistema.servicos');
  Route::get('avisos','SistemaController@avisos')->name('sistema.avisos');
  /*Route::get('categorias','SistemaController@categorias')->name('sistema.categorias');*/
  Route::get('compromissos','SistemaController@compromissos')->name('sistema.compromissos');
  Route::get('mapas','SistemaController@mapas')->name('sistema.mapas');

  /// Adicionar
  Route::get('adicionarUsuario','SistemaController@adicionarUsuario')->name('sistema.adicionarUsuario');
  //Route::get('adicionarCategoria','SistemaController@adicionarCategoria')->name('sistema.adicionarCategoria');
  Route::get('adicionarBolsa','SistemaController@adicionarBolsa')->name('sistema.adicionarBolsa');
  Route::get('adicionarAviso','SistemaController@adicionarAviso')->name('sistema.adicionarAviso');
  Route::get('adicionarAuxilio','SistemaController@adicionarAuxilio')->name('sistema.adicionarAuxilio');
  Route::get('adicionarServico','SistemaController@adicionarServico')->name('sistema.adicionarServico');
  Route::get('adicionarSecao/{id}','SistemaController@adicionarSecao')->name('sistema.adicionarSecao');
  Route::get('adicionarParagrafo/{id}','SistemaController@adicionarParagrafo')->name('sistema.adicionarParagrafo');
  Route::get('adicionarLista/{id}','SistemaController@adicionarLista')->name('sistema.adicionarLista');
  //Route::get('adicionarDescricao/{id}','SistemaController@adicionarDescricao')->name('sistema.adicionarDescricao');
  Route::get('adicionarDocumento/{id}','SistemaController@adicionarDocumento')->name('sistema.adicionarDocumento');
  Route::get('adicionarCompromisso','SistemaController@adicionarCompromisso')->name('sistema.adicionarCompromisso');
  //Route::get('adicionarDivisao/{id}','SistemaController@adicionarDivisao')->name('sistema.adicionarDivisao');
  Route::get('adicionarMapa','SistemaController@adicionarMapa')->name('sistema.adicionarMapa');
  Route::get('adicionarItem/{id}','SistemaController@adicionarItem')->name('sistema.adicionarItem');
  //Route::get('adicionarCoordenadoria','SistemaController@adicionarCoordenadoria')->name('sistema.adicionarCoordenadoria');

  /// Confirmar cadastro
  Route::post('confirmarCadastroUsuario','SistemaController@confirmarCadastroUsuario')->name('sistema.confirmarCadastroUsuario');
  //Route::post('confirmarCadastroCategoria','SistemaController@confirmarCadastroCategoria')->name('sistema.confirmarCadastroCategoria');
  Route::post('confirmarCadastroBolsa','SistemaController@confirmarCadastroBolsa')->name('sistema.confirmarCadastroBolsa');
  Route::post('confirmarCadastroAviso','SistemaController@confirmarCadastroAviso')->name('sistema.confirmarCadastroAviso');
  Route::post('confirmarCadastroAuxilio','SistemaController@confirmarCadastroAuxilio')->name('sistema.confirmarCadastroAuxilio');
  Route::post('confirmarCadastroServico','SistemaController@confirmarCadastroServico')->name('sistema.confirmarCadastroServico');
  Route::post('confirmarCadastroSecao','SistemaController@confirmarCadastroSecao')->name('sistema.confirmarCadastroSecao');
  Route::post('confirmarCadastroParagrafo','SistemaController@confirmarCadastroParagrafo')->name('sistema.confirmarCadastroParagrafo');
  Route::post('confirmarCadastroLista','SistemaController@confirmarCadastroLista')->name('sistema.confirmarCadastroLista');
  //Route::post('confirmarCadastroDescricao','SistemaController@confirmarCadastroDescricao')->name('sistema.confirmarCadastroDescricao');
  Route::post('confirmarCadastroDocumento','SistemaController@confirmarCadastroDocumento')->name('sistema.confirmarCadastroDocumento');
  //Route::post('confirmarCadastroCoordenadoria','SistemaController@confirmarCadastroCoordenadoria')->name('sistema.confirmarCadastroCoordenadoria');
  Route::post('confirmarCadastroCompromisso','SistemaController@confirmarCadastroCompromisso')->name('sistema.confirmarCadastroCompromisso');
  //Route::post('confirmarCadastroDivisao','SistemaController@confirmarCadastroDivisao')->name('sistema.confirmarCadastroDivisao');
  Route::post('confirmarCadastroMapa','SistemaController@confirmarCadastroMapa')->name('sistema.confirmarCadastroMapa');
  Route::post('confirmarCadastroItem','SistemaController@confirmarCadastroItem')->name('sistema.confirmarCadastroItem');

  // Ver
  Route::get('verUsuario/{id}','SistemaController@verUsuario')->name('sistema.verUsuario');
  //Route::get('verCategoria/{id}','SistemaController@verCategoria')->name('sistema.verCategoria');
  Route::get('verBolsa/{id}','SistemaController@verBolsa')->name('sistema.verBolsa');
  Route::get('verAviso/{id}','SistemaController@verAviso')->name('sistema.verAviso');
  Route::get('verAuxilio/{id}','SistemaController@verAuxilio')->name('sistema.verAuxilio');
  Route::get('verServico/{id}','SistemaController@verServico')->name('sistema.verServico');
  Route::get('verSecao/{id}','SistemaController@verSecao')->name('sistema.verSecao');
  Route::get('verParagrafo/{id}','SistemaController@verParagrafo')->name('sistema.verParagrafo');
  Route::get('verLista/{id}','SistemaController@verLista')->name('sistema.verLista');
  //Route::get('verDescricao/{id}','SistemaController@verDescricao')->name('sistema.verDescricao');
  //Route::get('verCoordenadoria/{id}','SistemaController@verCoordenadoria')->name('sistema.verCoordenadoria');
  Route::get('verCompromisso/{id}','SistemaController@verCompromisso')->name('sistema.verCompromisso');
  //Route::get('verDivisao/{id}','SistemaController@verDivisao')->name('sistema.verDivisao');
  Route::get('verItem/{id}','SistemaController@verItem')->name('sistema.verItem');

  /// Deletar
  Route::post('deletarUsuario','SistemaController@deletarUsuario')->name('sistema.deletarUsuario');
  //Route::post('deletarCategoria','SistemaController@deletarCategoria')->name('sistema.deletarCategoria');
  Route::post('deletarBolsa','SistemaController@deletarBolsa')->name('sistema.deletarBolsa');
  Route::post('deletarAviso','SistemaController@deletarAviso')->name('sistema.deletarAviso');
  Route::post('deletarAuxilio','SistemaController@deletarAuxilio')->name('sistema.deletarAuxilio');
  Route::post('deletarServico','SistemaController@deletarServico')->name('sistema.deletarServico');
  Route::post('deletarSecao','SistemaController@deletarSecao')->name('sistema.deletarSecao');
  Route::post('deletarParagrafo','SistemaController@deletarParagrafo')->name('sistema.deletarParagrafo');
  Route::post('deletarLista','SistemaController@deletarLista')->name('sistema.deletarLista');
  //Route::post('deletarDescricao','SistemaController@deletarDescricao')->name('sistema.deletarDescricao');
  Route::post('deletarDocumento','SistemaController@deletarDocumento')->name('sistema.deletarDocumento');
  //Route::post('deletarCoordenadoria','SistemaController@deletarCoordenadoria')->name('sistema.deletarCoordenadoria');
  Route::post('deletarCompromisso',"SistemaController@deletarCompromisso")->name("sistema.deletarCompromisso");
  //Route::post('deletarDivisao',"SistemaController@deletarDivisao")->name("sistema.deletarDivisao");
  Route::post('deletarMapa','SistemaController@deletarMapa')->name('sistema.deletarMapa');
  Route::post('deletarItem','SistemaController@deletarItem')->name('sistema.deletarItem');
  /// Salvar
  Route::post('salvarUsuario','SistemaController@salvarUsuario')->name('sistema.salvarUsuario');
  //Route::post('salvarCategoria','SistemaController@salvarCategoria')->name('sistema.salvarCategoria');
  Route::post('salvarBolsa','SistemaController@salvarBolsa')->name('sistema.salvarBolsa');
  Route::post('salvarAviso','SistemaController@salvarAviso')->name('sistema.salvarAviso');
  Route::post('salvarAuxilio','SistemaController@salvarAuxilio')->name('sistema.salvarAuxilio');
  Route::post('salvarServico','SistemaController@salvarServico')->name('sistema.salvarServico');
  Route::post('salvarSecao','SistemaController@salvarSecao')->name('sistema.salvarSecao');
  Route::post('salvarParagrafo','SistemaController@salvarParagrafo')->name('sistema.salvarParagrafo');
  Route::post('salvarLista','SistemaController@salvarLista')->name('sistema.salvarLista');
  //Route::post('salvarCoordenadoria','SistemaController@salvarCoordenadoria')->name('sistema.salvarCoordenadoria');
  //Route::post('salvarDescricao','SistemaController@salvarDescricao')->name('sistema.salvarDescricao');
  Route::post('salvarCompromisso','SistemaController@salvarCompromisso')->name('sistema.salvarCompromisso');
  //Route::post('salvarDivisao','SistemaController@salvarDivisao')->name('sistema.salvarDivisao');
  Route::post('salvarItem','SistemaController@salvarItem')->name('sistema.salvarItem');
  /// Baixar

});



//Route::get('baixarDocumento/{id}','SistemaController@baixarDocumento')->name('baixarDocumento');
Route::get('baixarMapa/{id}','SistemaController@baixarMapa')->name('baixarMapa');



/* Rotas do WebService (Alimentação do aplicativo) */

Route::prefix('app/ws')->middleware('CORS')->group(function(){

    Route::get('avisos','WebServiceController@avisosAppWS')->name('ws.avisosAppWS');
    Route::post('baixarDocumento','WebServiceController@salvarDescricao')->name('ws.baixarDocumentoAppWS');
    Route::get('compromissos','WebServiceController@compromissosAppWS')->name('ws.compromissosAppWS');
    Route::get('noticias','WebServiceController@noticiasAppWS')->name('ws.noticiasAppWS');
    Route::post('atualizarReceiverID','WebServiceController@atualizarReceiverID')->name('ws.atualizarReceiverID');
    Route::get('categorias/{tipo}','WebServiceController@categoriasAppWS')->name('ws.atualizarReceiverID');
    Route::get('secoes/{categoriaId}','WebServiceController@secoesAppWS')->name('ws.secoesAppWS');
    Route::get('paragrafos/{secaoId}','WebServiceController@paragrafosAppWS')->name('ws.paragrafosAppWS');
    Route::get('lista/{paragrafoId}','WebServiceController@listasAppWS')->name('ws.listaAppWS');
    Route::get('itens/{listaId}','WebServiceController@itensAppWS')->name('ws.itensAppWS');
    Route::get('documentos/{categoriaId}','WebServiceController@documentosAppWS')->name('ws.documentosAppWS');
    Route::get('mapas','WebServiceController@mapasAppWS')->name('ws.mapasAppWS');
    Route::post('notificarEmails','WebServiceController@notificarEmails')->name('ws.notificarEmails');
    Route::get('cadastrarEmail/{email}','WebServiceController@cadastrarEmail')->name('ws.cadastrarEmail');
    Route::post('cancelarNotificacoesEmail','WebServiceController@cancelarNotificacoesEmail')->name('ws.cancelarNotificacoesEmail');

});

// Rota para testar a visualização dos mapas cadastrados

Route::get('mostrarMapa/{id}','WebServiceController@mostrarMapaAppWS')->middleware('CORS')->name('ws.mostrarMapaAppWS');
