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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{

  public function usuarios(){

    $usuarios = User::where('id','!=',Auth::user()->id)->get();

    return view('usuario.usuarios',['usuarios' => $usuarios]);

  }

  public function categorias(){

    $categorias = Categorias::all();

    return view('usuario.categorias',['categorias' => $categorias]);

  }

  public function coordenadorias(){

    $coordenadorias = Coordenadorias::all();

    return view('usuario.coordenadorias',['coordenadorias' => $coordenadorias]);

  }

  /// Adicionar

  public function adicionarUsuario(){

    return view('usuario.adicionar.adicionarUsuario');

  }

  public function adicionarCategoria(){

    return view('usuario.adicionar.adicionarCategoria');

  }

  public function adicionarCoordenadoria(){

    return view('usuario.adicionar.adicionarCoordenadoria');

  }

  public function adicionarDescricao($id){

    return view('usuario.adicionar.adicionarDescricao',['id' => $id]);

  }

  public function adicionarDocumento($id){

    return view('usuario.adicionar.adicionarDocumento',['id' => $id]);

  }

  public function adicionarCompromisso($id){

    return view('usuario.adicionar.adicionarCompromisso',['id' => $id]);

  }

  public function adicionarDivisao($id){

    return view('usuario.adicionar.adicionarDivisao',['id' => $id]);

  }

  public function adicionarMapa($id){

    return view('usuario.adicionar.adicionarMapa',['id' => $id]);

  }

  public function adicionarItem($id){

    return view('usuario.adicionar.adicionarItem',['id' => $id]);

  }

  /// Confirmar cadastro

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

    return redirect()->route('usuario.usuarios');

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
      'tipo' => 'required|numeric'

    ]);

    $categoria = new Categorias;

    $categoria->nome = $request->nome;
    $categoria->responsavel = $request->responsavel;
    $categoria->email = $request->email;
    $categoria->fone = $request->fone;
    $categoria->bairro = $request->bairro;
    $categoria->rua = $request->rua;
    $categoria->numero = $request->numero;
    $categoria->tipo_categoria = $request->tipo;

    $categoria->save();

    return redirect()->route('usuario.categorias');

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

    return redirect()->route('usuario.verCategoria',['id' => $request->id]);

  }

  public function confirmarCadastroDocumento(Request $request){

    $path = Storage::disk('documentos_prae')->putFileAs($request->id,$request->file('arquivo'),$request->nome);

    $documento = new Documentos;

    $documento->nome = $request->nome;
    $documento->rota = $path;
    $documento->categoria_id = $request->id;

    $documento->save();

    return redirect()->route('usuario.verCategoria',['id' => $request->id]);

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

    return redirect()->route('usuario.coordenadorias');

  }

  public function confirmarCadastroCompromisso(Request $request){

    $request->validate([

      'titulo' => 'required|string',
      'data' => 'required|string'

    ]);

    $compromisso = new Compromissos;

    $compromisso->coordenadoria_id = $request->id;
    $compromisso->titulo = $request->titulo;
    $compromisso->data = $request->data;

    $compromisso->save();

    return redirect()->route('usuario.verCoordenadoria',['id' => $request->id]);

  }

  public function confirmarCadastroMapa(Request $request){

    $request->validate([

      'nome' => 'nullable|string|unique:mapas,nome',
      'mapa' => 'required|file'

    ]);

    $nome = ( $request->nome == NULL ) ? $request->mapa->getClientOriginalName() : $request->nome ;

    $path = Storage::disk('mapas_prae')->putFileAs($request->id,$request->mapa,$nome);

    $mapa = new Mapas;

    $mapa->nome = $nome;
    $mapa->rota = $path;
    $mapa->coordenadoria_id = $request->id;

    $mapa->save();

    return redirect()->route('usuario.verCoordenadoria',['id' => $request->id]);

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

    return redirect()->route('usuario.verCoordenadoria',['id' => $request->id]);

  }

  public function confirmarCadastroItem(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'descricao' => 'required|string'

    ]);

    $item = new Itens;

    $item->nome = $request->nome;
    $item->descricao = $request->descricao;
    $item->categoria_id = $request->id;

    $item->save();

    return redirect()->route('usuario.verCategoria',['id' => $request->id]);

  }

  /// Ver

  public function verCategoria($id){

    $categoria = Categorias::find($id);
    $descricoes = Descricoes::where('categoria_id',$categoria->id)->get();
    $documentos = Documentos::where('categoria_id',$categoria->id)->get();
    $itens = Itens::where('categoria_id',$categoria->id)->get();

    return view('usuario.ver.verCategoria',['categoria' => $categoria,'descricoes' => $descricoes,'documentos' => $documentos, 'itens' => $itens]);

  }

  public function verUsuario($id){

    $usuario = User::find($id);

    return view('usuario.ver.verUsuario',['usuario' => $usuario]);

  }

  public function verDescricao($id){

    $descricao = Descricoes::find($id);

    return view('usuario.ver.verDescricao',['descricao' => $descricao]);

  }

  public function verCoordenadoria($id){

    $coordenadoria = Coordenadorias::find($id);
    $mapas = Mapas::where('coordenadoria_id',$id)->get();
    $divisoes = Divisoes::where('coordenadoria_id',$id)->get();
    $compromissos = Compromissos::where('coordenadoria_id',$id)->get();

    return view('usuario.ver.verCoordenadoria',['coordenadoria' => $coordenadoria, 'mapas' => $mapas, 'divisoes' => $divisoes, 'compromissos' => $compromissos]);

  }

  public function verCompromisso($id){

    $compromisso = Compromissos::find($id);

    $compromisso->data = explode(' ',$compromisso->data)[0].'T'.explode(' ',$compromisso->data)[1];

    return view('usuario.ver.verCompromisso',['compromisso' => $compromisso]);

  }

  public function verDivisao($id){

    $divisao = Divisoes::find($id);

    return view('usuario.ver.verDivisao',['divisao' => $divisao]);

  }

  public function verItem($id){

    $item = Itens::find($id);

    return view('usuario.ver.verItem',['item' => $item]);

  }

  /// Deletar

  public function deletarCategoria(Request $request){

    Categorias::find($request->id)->delete();

    Documentos::where('categoria_id',$request->id)->delete();

    Descricoes::where('categoria_id',$request->id)->delete();

    return redirect()->route('usuario.categorias');

  }

  public function deletarDocumento(Request $request){

    $doc = Documentos::find($request->id);

    $categoriaId = $doc->categoria_id;

    //dd(storage_path('app/documentos_prae').'/'.$doc->rota);

    Storage::disk('documentos_prae')->delete('/'.$doc->rota);

    $doc->delete();

    return redirect()->route('usuario.verCategoria',['id' => $categoriaId]);

  }

  public function deletarUsuario(Request $request){

    User::find($request->id)->delete();

    return redirect()->route('usuario.usuarios');

  }

  public function deletarDescricao(Request $request){

    $desc = Descricoes::find($request->id);

    $categoriaId = $desc->categoria_id;

    $desc->delete();

    return redirect()->route('usuario.verCategoria',['id' => $categoriaId]);

  }

  public function deletarMapa(Request $request){

    $mapa = Mapas::find($request->id);

    $coordenadoria_id = $mapa->coordenadoria_id;

    Storage::disk('mapas_prae')->delete('/'.$mapa->rota);

    $mapa->delete();

    return redirect()->route('usuario.verCoordenadoria',['id' => $coordenadoria_id]);

  }

  public function deletarDivisao(Request $request){

    $divisao = Divisoes::find($request->id);

    $coordenadoria_id = $divisao->coordenadoria_id;

    $divisao->delete();

    return redirect()->route('usuario.verCoordenadoria',['id' => $request->id]);

  }

  public function deletarCompromisso(Request $request){

    $compromisso = Compromissos::find($request->id);

    $coordenadoria_id = $compromisso->coordenadoria_id;

    $compromisso->delete();

    return redirect()->route('usuario.verCoordenadoria',['id' => $coordenadoria_id]);

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

    return redirect()->route('usuario.coordenadorias');

  }

  public function deletarItem(Request $request){

    $item = Itens::find($request->id);

    $id = $item->categoria_id;

    $item->delete();

    return redirect()->route('usuario.verCategoria',['id' => $id]);

  }

  /// Salvar

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

    return redirect()->route('usuario.verUsuario',['id' => $usuario->id]);

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

    return redirect()->route('usuario.verCategoria',['id' => $categoria->id]);

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

    return redirect()->route('usuario.verDescricao',['id' => $descricao->id]);


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

    return redirect()->route('usuario.verCoordenadoria',['id' => $request->id]);

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

    return redirect()->route('usuario.verCompromisso',['id' => $request->id]);

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

    return redirect()->route('usuario.verDivisao',['id' => $request->id]);

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

    return redirect()->route('usuario.verItem',['id' => $request->id]);

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

  public function baixarDocumentoAppWS(Request $request){

      return response()->download(asset('docs').'/'.$request->rota);

  }

  public function listaCategoriasAppWS(){

    $categorias = Categorias::all();

    //$categorias->ids = $categorias->pluck('id');
    //$categorias->nomes = $categorias->pluck('nome');

    foreach($categorias as $categoria){

      $categoria->descricoes = Descricoes::where('categoria_id',$categoria->id)->get();

      $categoria->itens = Itens::where('categoria_id',$categoria->id)->get();

      $categoria->documentos = Documentos::where('categoria_id',$categoria->id)->get();

    }


    return response()->json($categorias)->withHeaders([
      "Access-Control-Allow-Origin" => "*",
      "Acess-Control-Allow-Methods" => "GET",
      "Accept" => "application/json",
      "content-type" => "application/json"
    ]);

    }

  public function categoriaAppWS($id){

    $categorias = Categorias::all();

    foreach($categorias as $categoria){

      $categoria->descricoes = Descricoes::where('categoria_id',$categoria->id)->get();
      $categoria->documentos = Documentos::where('categoria_id',$categoria->id)->get();

    }

    return response()->json($categorias)->withHeaders([
      "Access-Control-Allow-Origin" => "*",
      "Acess-Control-Allow-Methods" => "GET",
      "Accept" => "application/json",
      "content-type" => "application/json"
    ]);;

  }

}
