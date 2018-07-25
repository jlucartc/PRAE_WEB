<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categorias;
use App\Descricoes;
use App\Documentos;
use App\Coordenadorias;
use App\Divisoes;
use App\Mapas;
use App\Compromissos;
use App\Itens;
use App\Noticias;
use App\ReceiverID;
use App\Listas;
use App\Paragrafos;
use App\Secoes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use HTTP_Request2;



class SistemaController extends Controller
{

  public function usuarios(){

    $usuarios = User::where('id','!=',Auth::user()->id)->get();

    return view('sistema.usuarios',['usuarios' => $usuarios]);

  }

  public function bolsas(){

    $bolsas = Categorias::where('tipo_categoria',1)->get();

    return view('sistema.bolsas',['bolsas' => $bolsas]);

  }

  public function auxilios(){

    $auxilios = Categorias::where('tipo_categoria',2)->get();

    return view('sistema.auxilios',['auxilios' => $auxilios]);

  }

  public function servicos(){

      $servicos = Categorias::where('tipo_categoria',3)->get();

      return view('sistema.servicos',['servicos' => $servicos]);

  }

  public function categorias(){

    $categorias = Categorias::all();

    return view('sistema.categorias',['categorias' => $categorias]);

  }

  public function coordenadorias(){

    $coordenadorias = Coordenadorias::all();

    return view('sistema.coordenadorias',['coordenadorias' => $coordenadorias]);

  }

  public function compromissos(){

    $compromissos = Compromissos::all();

    return view('sistema.compromissos',['compromissos' => $compromissos]);

  }

  public function mapas(){

    $mapas = Mapas::all();

    return view('sistema.mapas',['mapas' => $mapas]);

  }

  /// Adicionar

  public function adicionarSecao($id){

    $tipo = Categorias::find($id)->tipo_categoria;

    $rota = "";

    switch($tipo){
      case 1:
        $rota = 'sistema.verBolsa';
        break;
      case 2:
        $rota = 'sistema.verAuxilio';
        break;
      case 3:
        $rota = 'sistema.verServico';
        break;

    }

    return view('sistema.adicionar.adicionarSecao',['id' => $id, 'rota' => $rota]);

  }

  public function adicionarParagrafo($id){

    return view('sistema.adicionar.adicionarParagrafo',['id' => $id]);

  }

  public function adicionarLista($id){

    return view('sistema.adicionar.adicionarLista',['id' => $id]);

  }

  public function adicionarUsuario(){

    return view('sistema.adicionar.adicionarUsuario');

  }

  public function adicionarCategoria(){

    return view('sistema.adicionar.adicionarCategoria');

  }

  public function adicionarBolsa(){

    return view('sistema.adicionar.adicionarBolsa');

  }

  public function adicionarAuxilio(){

    return view('sistema.adicionar.adicionarAuxilio');

  }

  public function adicionarServico(){

    return view('sistema.adicionar.adicionarServico');

  }

  public function adicionarCoordenadoria(){

    return view('sistema.adicionar.adicionarCoordenadoria');

  }

  public function adicionarDescricao($id){

    return view('sistema.adicionar.adicionarDescricao',['id' => $id]);

  }

  public function adicionarDocumento($id){

    $tipo = Categorias::find($id)->tipo_categoria;

    $rota = "";

    switch($tipo){
      case 1:
        $rota = 'sistema.verBolsa';
        break;
      case 2:
        $rota = 'sistema.verAuxilio';
        break;
      case 3:
        $rota = 'sistema.verServico';
        break;

    }

    return view('sistema.adicionar.adicionarDocumento',['id' => $id,'rota' => $rota]);

  }

  public function adicionarCompromisso(){

    return view('sistema.adicionar.adicionarCompromisso');

  }

  public function adicionarDivisao($id){

    return view('sistema.adicionar.adicionarDivisao',['id' => $id]);

  }

  public function adicionarMapa(){

    return view('sistema.adicionar.adicionarMapa');

  }

  public function adicionarItem($id){

    return view('sistema.adicionar.adicionarItem',['id' => $id]);

  }

  /// Confirmar cadastro

  public function confirmarCadastroSecao(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'id' => 'required|numeric',

    ]);

    $secao = new Secoes();

    $secao->nome = $request->nome;
    $secao->categoria_id = $request->id;

    $secao->save();

    return redirect()->back()->with('mensagem','Seção adicionada com sucesso')->with('mensagem','Seção adicionada com sucesso!');

  }

  public function confirmarCadastroParagrafo(Request $request){

    $request->validate([

      'titulo' => 'required|string',
      'texto' => 'required|string',
      'id' => 'required|numeric'

    ]);

    $paragrafo = new Paragrafos();

    $paragrafo->titulo = $request->titulo;
    $paragrafo->texto = $request->texto;
    $paragrafo->secao_id = $request->id;

    $paragrafo->save();

    return redirect()->route('sistema.adicionarParagrafo',['id' => $request->id])->with('mensagem','Parágrafo adicionado com sucesso!');

  }

  public function confirmarCadastroLista(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'id' => 'required|numeric'

    ]);

    $lista = new Listas();

    $lista->nome = $request->nome;
    $lista->paragrafo_id = $request->id;

    $lista->save();

    return redirect()->route('sistema.adicionarLista',['id' => $request->id])->with('mensagem','Lista adicionada com sucesso!');

  }

  public function confirmarCadastroBolsa(Request $request){

    $request->validate([

      'nome' => 'required|string|unique:categorias,nome',
      'responsavel' => 'required|string',
      'email' => 'nullable|string',
      'fone' => 'nullable|string',
      'bairro' => 'nullable|string',
      'rua' => 'nullable|string',
      'descricao' => 'required|string'

      ]);

      $bolsa = new Categorias();

      $bolsa->nome = $request->nome;
      $bolsa->responsavel = $request->responsavel;
      $bolsa->email = $request->email;
      $bolsa->fone = $request->fone;
      $bolsa->bairro = $request->bairro;
      $bolsa->rua = $request->rua;
      $bolsa->numero = $request->numero;
      $bolsa->tipo_categoria = 1;
      $bolsa->descricao = $request->descricao;

      $bolsa->save();

      return redirect()->route('sistema.adicionarBolsa',['id' => $request->id])->with('mensagem','Bolsa adicionada com sucesso!');

  }

  public function confirmarCadastroAuxilio(Request $request){

    $request->validate([

      'nome' => 'required|string|unique:categorias,nome',
      'responsavel' => 'required|string',
      'email' => 'nullable|string',
      'fone' => 'nullable|string',
      'bairro' => 'nullable|string',
      'rua' => 'nullable|string',
      'numero' => 'nullable|string',
      'descricao' => 'required|string'

    ]);

      $auxilio = new Categorias();

      $auxilio->nome = $request->nome;
      $auxilio->responsavel = $request->responsavel;
      $auxilio->email = $request->email;
      $auxilio->fone = $request->fone;
      $auxilio->bairro = $request->bairro;
      $auxilio->rua = $request->rua;
      $auxilio->numero = $request->numero;
      $auxilio->tipo_categoria = 2;
      $auxilio->descricao = $request->descricao;

      $auxilio->save();

      return redirect()->route('sistema.adicionarAuxilio',['id' => $request->id])->with('mensagem','Auxilio adicionado com sucesso!');

  }

  public function confirmarCadastroServico(Request $request){

    $request->validate([

      'nome' => 'required|string|unique:categorias,nome',
      'responsavel' => 'required|string',
      'email' => 'nullable|string',
      'fone' => 'nullable|string',
      'bairro' => 'nullable|string',
      'rua' => 'nullable|string',
      'numero' => 'nullable|string',
      'descricao' => 'required|string'

    ]);

      $servico = new Categorias();

      $servico->nome = $request->nome;
      $servico->responsavel = $request->responsavel;
      $servico->email = $request->email;
      $servico->fone = $request->fone;
      $servico->bairro = $request->bairro;
      $servico->rua = $request->rua;
      $servico->numero = $request->numero;
      $servico->tipo_categoria = 3;
      $servico->descricao = $request->descricao;

      $servico->save();

      return redirect()->route('sistema.adicionarServico',['id' => $request->id])->with('mensagem','Serviço adicionado com sucesso!');

  }

  public function confirmarCadastroUsuario(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'email' => 'required|string',
      'usuario' => 'required|unique:usuarios,usuario',
      'senha' => 'required|confirmed'

    ]);

    $usuario = new User;

    $usuario->nome = $request->nome;
    $usuario->email = $request->email;
    $usuario->usuario = $request->usuario;
    $usuario->senha = bcrypt($request->senha);

    $usuario->save();

    return redirect()->route('sistema.adicionarUsuario',['id' => $request->id])->with('mensagem','Usuário adicionado com sucesso!');

  }

  public function confirmarCadastroCategoria(Request $request){

    $request->validate([

      'nome' => 'required|string|unique:categorias,nome',
      'responsavel' => 'required|string',
      'email' => 'nullable|string',
      'fone' => 'nullable|string',
      'bairro' => 'nullable|string',
      'rua' => 'nullable|string',
      'numero' => 'nullable|string',
      'tipo' => 'required|numeric',
      'descricao' => 'required|string'

    ]);

    $categoria = new Categorias();

    $categoria->nome = $request->nome;
    $categoria->responsavel = $request->responsavel;
    $categoria->email = $request->email;
    $categoria->fone = $request->fone;
    $categoria->bairro = $request->bairro;
    $categoria->rua = $request->rua;
    $categoria->numero = $request->numero;
    $categoria->tipo_categoria = $request->tipo;
    $categoria->descricao = $request->descricao;

    $categoria->save();

    return redirect()->route('sistema.adicionarCategoria',['id' => $request->id])->with('mensagem','Categoria adicionada com sucesso!');

  }

  public function confirmarCadastroCoordenadoria(Request $request){

    $request->validate([

      "nome" => "required|string|unique:coordenadorias,nome",
      "coordenador" => "required|string",
      "fone" => "nullable|string",
      "fax" => "nullable|string",
      "email" => "nullable|string"

    ]);

    $coordenadoria = new Coordenadorias;

    $coordenadoria->nome = $request->nome;
    $coordenadoria->coordenador = $request->coordenador;
    $coordenadoria->fone = $request->fone;
    $coordenadoria->fax = $request->fax;
    $coordenadoria->email = $request->email;

    $coordenadoria->save();

    return redirect()->route('sistema.adicionarCoordenadoria',['id' => $request->id])->with('mensagem','Coordenadoria adicionada com sucesso!');

  }

  public function confirmarCadastroDescricao(Request $request){

    $request->validate([

      'titulo' => 'required|string',
      'texto' => 'required|string',
      'id' => 'required|integer'

    ]);

    $descricao = new Descricoes;

    $descricao->titulo = $request->titulo;
    $descricao->texto = $request->texto;
    $descricao->categoria_id = $request->id;

    $descricao->save();

    return redirect()->route('sistema.adicionarDescricao',['id' => $request->id])->with('mensagem','Descrição adicionada com sucesso!');

  }

  public function confirmarCadastroDocumento(Request $request){

    $nome = ( $request->nome == NULL ) ? $request->arquivo->getClientOriginalName() : $request->nome ;

    $path = Storage::disk('documentos_prae')->putFileAs($request->id,$request->file('arquivo'),$nome);

    $documento = new Documentos;

    $documento->nome = $nome;
    $documento->rota = $path;
    $documento->categoria_id = $request->id;

    $documento->save();

    return redirect()->route('sistema.adicionarDocumento',['id' => $request->id])->with('mensagem','Documento adicionado com sucesso!');

  }

  public function confirmarCadastroCompromisso(Request $request){

    $request->validate([

      'titulo' => 'required|string',
      'data' => 'required|string',
      'local' => 'required|string'

    ]);

    $compromisso = new Compromissos;

    $compromisso->titulo = $request->titulo;
    $compromisso->data = $request->data;
    $compromisso->local = $request->local;

    $compromisso->save();

    return redirect()->route('sistema.adicionarCompromisso')->with('mensagem','Compromisso adicionado com sucesso!');

  }

  public function confirmarCadastroMapa(Request $request){

    $request->validate([

      'nome' => 'nullable|string|unique:mapas,nome',
      'mapa' => 'required|file'

    ]);

    $nome = ( $request->nome == NULL ) ? $request->mapa->getClientOriginalName() : $request->nome ;

    $path = Storage::disk('mapas_prae')->putFileAs("",$request->mapa,$nome);

    $mapa = new Mapas;

    $mapa->nome = $nome;
    $mapa->rota = $path;

    $mapa->save();

    return redirect()->route('sistema.adicionarMapa')->with('mensagem','Mapa adicionado com sucesso!');

  }

  public function confirmarCadastroDivisao(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'email' => 'nullable|string',
      'fone' => 'nullable|string',
      'fax' => 'nullable|string'

    ]);

    $divisao = new Divisoes;

    $divisao->nome = $request->nome;
    $divisao->email = $request->email;
    $divisao->fone = $request->fone;
    $divisao->fax = $request->fax;
    $divisao->coordenadoria_id = $request->id;

    $divisao->save();

    return redirect()->route('sistema.adicionarDivisao',['id' => $request->id])->with('mensagem','Divisão adicionada com sucesso!');

  }

  public function confirmarCadastroItem(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'descricao' => 'nullable|string'

    ]);

    $item = new Itens;

    $item->nome = $request->nome;
    $item->descricao = $request->descricao;
    $item->lista_id = $request->id;

    $item->save();

    return redirect()->route('sistema.adicionarItem',['id' => $request->id])->with('mensagem','Item adicionado com sucesso!');

  }

  /// Ver

  public function verSecao($id){

    $secao = Secoes::find($id);
    $paragrafos = Paragrafos::where('secao_id',$id)->get();
    $tipo = Categorias::find($secao->categoria_id)->tipo_categoria;

    $rota = "";

    switch($tipo){

      case 1:
        $rota = "sistema.verBolsa";
        break;
      case 2:
        $rota = "sistema.verAuxilio";
        break;
      case 3:
        $rota = "sistema.verServico";
        break;

    }

    return view('sistema.ver.verSecao',['secao' => $secao,'paragrafos' => $paragrafos,'rota' => $rota]);

  }

  public function verParagrafo($id){

    $paragrafo = Paragrafos::find($id);
    $listas = Listas::where('paragrafo_id',$id)->get();

    return view('sistema.ver.verParagrafo',['paragrafo' => $paragrafo,'listas' => $listas]);

  }

  public function verLista($id){

    $lista = Listas::find($id);
    $itens = Itens::where('lista_id',$id)->get();

    return view('sistema.ver.verLista',['lista' => $lista,'itens' => $itens]);


  }

  public function verBolsa($id){

    $bolsa = Categorias::find($id);
    $secoes = Secoes::where('categoria_id',$id)->get();
    $documentos = Documentos::where('categoria_id',$id)->get();

    return view('sistema.ver.verBolsa',['bolsa' => $bolsa,'secoes' => $secoes,'documentos' => $documentos]);

  }

  public function verAuxilio($id){

    $auxilio = Categorias::find($id);
    $secoes = Secoes::where('categoria_id',$id)->get();
    $documentos = Documentos::where('categoria_id',$id)->get();

    return view('sistema.ver.verAuxilio',['auxilio' => $auxilio,'secoes' => $secoes,'documentos' => $documentos]);

  }

  public function verServico($id){

    $servico = Categorias::find($id);
    $secoes = Secoes::where('categoria_id',$id)->get();
    $documentos = Documentos::where('categoria_id',$id)->get();

    return view('sistema.ver.verServico',['servico' => $servico,'secoes' => $secoes,'documentos' => $documentos]);

  }

  public function verCategoria($id){

    $categoria = Categorias::find($id);
    $descricoes = Descricoes::where('categoria_id',$categoria->id)->get();
    $documentos = Documentos::where('categoria_id',$categoria->id)->get();
    $itens = Itens::where('categoria_id',$categoria->id)->get();

    return view('sistema.ver.verCategoria',['categoria' => $categoria,'descricoes' => $descricoes,'documentos' => $documentos, 'itens' => $itens]);

  }

  public function verUsuario($id){

    $usuario = User::find($id);

    return view('sistema.ver.verUsuario',['usuario' => $usuario]);

  }

  public function verDescricao($id){

    $descricao = Descricoes::find($id);

    return view('sistema.ver.verDescricao',['descricao' => $descricao]);

  }

  public function verCoordenadoria($id){

    $coordenadoria = Coordenadorias::find($id);
    $mapas = Mapas::where('coordenadoria_id',$id)->get();
    $divisoes = Divisoes::where('coordenadoria_id',$id)->get();
    $compromissos = Compromissos::where('coordenadoria_id',$id)->get();

    return view('sistema.ver.verCoordenadoria',['coordenadoria' => $coordenadoria, 'mapas' => $mapas, 'divisoes' => $divisoes, 'compromissos' => $compromissos]);

  }

  public function verCompromisso($id){

    $compromisso = Compromissos::find($id);

    $compromisso->data = explode(' ',$compromisso->data)[0].'T'.explode(' ',$compromisso->data)[1];

    return view('sistema.ver.verCompromisso',['compromisso' => $compromisso]);

  }

  public function verDivisao($id){

    $divisao = Divisoes::find($id);

    return view('sistema.ver.verDivisao',['divisao' => $divisao]);

  }

  public function verItem($id){

    $item = Itens::find($id);

    return view('sistema.ver.verItem',['item' => $item]);

  }

  /// Deletar

  public function deletarSecao(Request $request){

    $id = $request->id;

    $secao = Secoes::find($id);

    $categoria_id = $secao->categoria_id;

    $tipo = Categorias::find($categoria_id)->tipo_categoria;

    $secao->delete();

    $rota = "";

    switch($tipo){

      case 1:
        $rota = "sistema.verBolsa";
        break;
      case 2:
        $rota = "sistema.verAuxilio";
        break;
      case 3:
        $rota = "sistema.verServico";
        break;

    }

    return redirect()->route($rota,['id' => $categoria_id]);

  }

  public function deletarParagrafo(Request $request){

    $id = $request->id;

    $paragrafo = Paragrafos::find($id);

    $secao_id = $paragrafo->secao_id;

    $paragrafo->delete();

    return redirect()->route('sistema.verSecao',['id' => $secao_id]);

  }

  public function deletarLista(Request $request){

    $request->validate([
      'id' => 'required|numeric'
    ]);

    $lista = Listas::find($request->id);

    $paragrafo_id = $lista->paragrafo_id;

    $lista->delete();

    return redirect()->route('sistema.verParagrafo',['id' => $paragrafo_id]);

  }

  public function deletarBolsa(Request $request){

    $request->validate([
      'id' => 'required|numeric'
    ]);

      $bolsa = Categorias::find($request->id)->delete();

      return redirect()->route('sistema.bolsas');

  }

  public function deletarAuxilio(Request $request){

    $request->validate([
      'id' => 'required|numeric'
    ]);

    $auxilio = Categorias::find($request->id)->delete();

    return redirect()->route('sistema.auxilios');

  }

  public function deletarServico(Request $request){

    $request->validate([
      'id' => 'required|numeric'
    ]);

    $servico = Categorias::find($request->id)->delete();

    return redirect()->route('sistema.servicos');

  }

  public function deletarCategoria(Request $request){

    Categorias::find($request->id)->delete();

    $documentos = Documentos::where('categoria_id',$request->id)->get();

    $descricoes = Descricoes::where('categoria_id',$request->id)->get();

    foreach($documentos as $documento){

      Storage::disk('documentos_prae')->delete('/'.$documento->rota);

    }

    return redirect()->route('sistema.categorias');

  }

  public function deletarDocumento(Request $request){

    $doc = Documentos::find($request->id);

    $categoriaId = $doc->secao_id;

    //dd(storage_path('app/documentos_prae').'/'.$doc->rota);

    Storage::disk('documentos_prae')->delete('/'.$doc->rota);

    $doc->delete();

    return redirect()->route('sistema.verSecao',['id' => $categoriaId]);

  }

  public function deletarUsuario(Request $request){

    User::find($request->id)->delete();

    return redirect()->route('sistema.usuarios');

  }

  public function deletarDescricao(Request $request){

    $desc = Descricoes::find($request->id);

    $categoriaId = $desc->categoria_id;

    $desc->delete();

    return redirect()->route('sistema.verCategoria',['id' => $categoriaId]);

  }

  public function deletarMapa(Request $request){

    $mapa = Mapas::find($request->id);

    $coordenadoria_id = $mapa->coordenadoria_id;

    Storage::disk('mapas_prae')->delete('/'.$mapa->rota);

    $mapa->delete();

    return redirect()->route('sistema.mapas');

  }

  public function deletarDivisao(Request $request){

    $divisao = Divisoes::find($request->id);

    $coordenadoria_id = $divisao->coordenadoria_id;

    $divisao->delete();

    return redirect()->route('sistema.verCoordenadoria',['id' => $request->id]);

  }

  public function deletarCompromisso(Request $request){

    $compromisso = Compromissos::find($request->id);

    $coordenadoria_id = $compromisso->coordenadoria_id;

    $compromisso->delete();

    return redirect()->route('sistema.compromissos');

  }

  public function deletarCoordenadoria(Request $request){

    $coordenadoria = Coordenadorias::find($request->id);

    $mapas = Mapas::where('coordenadoria_id',$request->id)->get();

    Divisoes::where('coordenadoria_id',$request->id)->delete();

    Compromissos::where('coordenadoria_id',$request->id)->delete();

    foreach($mapas as $mapa){

      Storage::disk('mapas_prae')->delete('/'.$mapa->rota);
      $mapa->delete();
    }

    $coordenadoria->delete();

    return redirect()->route('sistema.coordenadorias');

  }

  public function deletarItem(Request $request){

    $item = Itens::find($request->id);

    $id = $item->lista_id;

    $item->delete();

    return redirect()->route('sistema.verLista',['id' => $id]);

  }

  /// Salvar

  public function salvarSecao(Request $request){

    $request->validate([

      'nome' => 'required|string'

    ]);

    $secao = Secoes::find($request->id);

    $secao->nome = $request->nome;

    $secao->save();

    return redirect()->route('sistema.verSecao',['id' => $request->id]);


  }

  public function salvarParagrafo(Request $request){

    $request->validate([

      'titulo' => 'required|string',
      'texto' => 'required|string'

    ]);

    $paragrafo = Paragrafos::find($request->id);

    $paragrafo->titulo = $request->titulo;
    $paragrafo->texto = $request->texto;

    $paragrafo->save();

    return redirect()->route('sistema.verParagrafo',['id' => $request->id]);

  }

  public function salvarLista(Request $request){

    $request->validate([

      'nome' => 'required|string'

    ]);

    $lista = Listas::find($request->id);

    $lista->nome = $request->nome;

    $lista->save();

    return redirect()->route('sistema.verLista',['id' => $request->id]);


  }

  public function salvarBolsa(Request $request){

    $request->validate([

      'nome' => 'required',
      'descricao' => 'required',
      'responsavel' => 'required',
      'email' => 'nullable',
      'fone' => 'nullable',
      'rua' => 'nullable',
      'numero' => 'nullable',
      'bairro' => 'nullable'

    ]);

    $bolsa = Categorias::find($request->id);

    $bolsa->nome = $request->nome;
    $bolsa->descricao = $request->descricao;
    $bolsa->responsavel = $request->responsavel;
    $bolsa->email = $request->email;
    $bolsa->fone = $request->fone;
    $bolsa->rua = $request->rua;
    $bolsa->numero = $request->numero;
    $bolsa->bairro = $request->bairro;

    $bolsa->save();

    return redirect()->route('sistema.verBolsa',['id' => $bolsa->id]);


  }

  public function salvarAuxilio(Request $request){

    $request->validate([

      'nome' => 'required',
      'descricao' => 'required',
      'responsavel' => 'required',
      'email' => 'nullable',
      'fone' => 'nullable',
      'rua' => 'nullable',
      'numero' => 'nullable',
      'bairro' => 'nullable'

    ]);

    $auxilio = Categorias::find($request->id);

    $auxilio->nome = $request->nome;
    $auxilio->descricao = $request->descricao;
    $auxilio->responsavel = $request->responsavel;
    $auxilio->email = $request->email;
    $auxilio->fone = $request->fone;
    $auxilio->rua = $request->rua;
    $auxilio->numero = $request->numero;
    $auxilio->bairro = $request->bairro;

    $bolsa->save();

    return redirect()->route('sistema.verAuxilio',['id' => $auxilio->id]);

  }

  public function salvarServico(Request $request){

    $request->validate([

      'nome' => 'required',
      'descricao' => 'required',
      'responsavel' => 'required',
      'email' => 'nullable',
      'fone' => 'nullable',
      'rua' => 'nullable',
      'numero' => 'nullable',
      'bairro' => 'nullable'

    ]);

    $servico = Categorias::find($request->id);

    $servico->nome = $request->nome;
    $servico->descricao = $request->descricao;
    $servico->responsavel = $request->responsavel;
    $servico->email = $request->email;
    $servico->fone = $request->fone;
    $servico->rua = $request->rua;
    $servico->numero = $request->numero;
    $servico->bairro = $request->bairro;

    $servico->save();

    return redirect()->route('sistema.verServico',['id' => $servico->id]);


  }

  public function salvarUsuario(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'email' => 'required|string',
      'usuario' => 'required|string',
      'senha' => 'required|confirmed'

    ]);

    $usuario = User::find($request->id);

    $usuario->nome = $request->nome;
    $usuario->email = $request->email;
    $usuario->usuario = $request->usuario;
    $usuario->senha = ($usuario->senha != $request->senha ) ? bcrypt($request->senha) : $usuario->senha;

    $usuario->save();

    return redirect()->route('sistema.verUsuario',['id' => $usuario->id]);

  }

  public function salvarCategoria(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'responsavel' => 'required|string',
      'email' => 'nullable|string',
      'fone' => 'nullable|string',
      'bairro' => 'nullable|string',
      'rua' => 'nullable|string',
      'numero' => 'nullable|string'

    ]);

    $categoria = Categorias::find($request->id);

    $categoria->nome = $request->nome;
    $categoria->responsavel = $request->responsavel;
    $categoria->email = $request->email;
    $categoria->fone = $request->fone;
    $categoria->bairro = $request->bairro;
    $categoria->rua = $request->rua;
    $categoria->numero = $request->numero;

    $categoria->save();

    return redirect()->route('sistema.verCategoria',['id' => $categoria->id]);

  }

  public function salvarDescricao(Request $request){

    $request->validate([

      'titulo' => 'required|string',
      'texto' => 'required|string',

    ]);

    $descricao = Descricoes::find($request->id);

    $descricao->titulo = $request->titulo;
    $descricao->texto = $request->texto;

    $descricao->save();

    return redirect()->route('sistema.verDescricao',['id' => $descricao->id]);


  }

  public function salvarCoordenadoria(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'coordenador' => 'string',
      'fone' => 'string',
      'fax' => 'string',
      'email' => 'string',

    ]);

    $coordenadoria = Coordenadorias::find($request->id);

    $coordenadoria->nome = $request->nome;
    $coordenadoria->coordenador = $request->coordenador;
    $coordenadoria->fone = $request->fone;
    $coordenadoria->fax = $request->fax;
    $coordenadoria->email = $request->email;

    $coordenadoria->save();

    return redirect()->route('sistema.verCoordenadoria',['id' => $request->id]);

  }

  public function salvarCompromisso(Request $request){

    $compromisso = Compromissos::find($request->id);

    if($compromisso->titulo == $request->titulo){

        $request->validate([

          'data' => 'required|string'

        ]);

    }else{

        $request->validate([

          'titulo' => 'required|string|unique:compromissos,nome',
          'data' => 'required|string'

        ]);

    }

    $compromisso->titulo = $request->titulo;
    $compromisso->data = $request->data;

    $compromisso->save();

    return redirect()->route('sistema.verCompromisso',['id' => $request->id]);

  }

  public function salvarDivisao(Request $request){

    $divisao = Divisoes::find($request->id);

    if( $divisao->nome == $request->nome ){

      $request->validate(
        [

          'email' => 'nullable|string',
          'fone' => 'nullable|string',
          'fax' => 'nullable|string'

        ]
      );

    }else{

      $request->validate(
        [

          'nome' => 'required|string|unique|divisoes,nome',
          'email' => 'nullable|string',
          'fone' => 'nullable|string',
          'fax' => 'nullable|string'

        ]
      );

    }

    $divisao->nome = $request->nome;
    $divisao->email = $request->email;
    $divisao->fone = $request->fone;
    $divisao->fax = $request->fax;

    $divisao->save();

    return redirect()->route('sistema.verDivisao',['id' => $request->id]);

  }

  public function salvarItem(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'descricao' => 'required|string'

    ]);

    $item = Itens::find($request->id);

    $item->nome = ($item->nome == $request->nome) ? $item->nome : $request->nome;
    $item->descricao = ($item->descricao == $request->descricao) ? $item->descricao : $request->descricao;

    $item->save();

    return redirect()->route('sistema.verItem',['id' => $request->id]);

  }

  /// Baixar

  public function baixarDocumento($id){

    $documento = Documentos::find($id);

    return response()->download(storage_path('app/documentos_prae').'/'.$documento->rota);

  }

  public function baixarMapa($id){

    $mapa = Mapas::find($id);

    return response()->download(storage_path('app/mapas_prae').'/'.$mapa->rota);


  }

  /// Web Services
}
