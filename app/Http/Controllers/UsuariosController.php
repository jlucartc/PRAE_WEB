<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categorias;
use App\Descricoes;
use App\Documentos;
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

  public function adicionarUsuario(){

    return view('usuario.adicionarUsuario');

  }

  public function adicionarCategoria(){

    return view('usuario.adicionarCategoria');

  }

  public function adicionarDescricao($id){

    return view('usuario.adicionarDescricao',['id' => $id]);

  }

  public function adicionarDocumento($id){

    return view('usuario.adicionarDocumento',['id' => $id]);

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

    return redirect()->route('usuario.usuarios');

  }

  public function confirmarCadastroCategoria(Request $request){

    $request->validate([

      'nome' => 'required|string|unique:categorias,nome',
      'responsavel' => 'required|string',
      'email' => 'required|string',
      'fone' => 'required|string',
      'bairro' => 'required|string',
      'rua' => 'required|string',
      'numero' => 'required|string'

    ]);

    $categoria = new Categorias;

    $categoria->nome = $request->nome;
    $categoria->responsavel = $request->responsavel;
    $categoria->email = $request->email;
    $categoria->fone = $request->fone;
    $categoria->bairro = $request->bairro;
    $categoria->rua = $request->rua;
    $categoria->numero = $request->numero;

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

  public function verCategoria($id){

    $categoria = Categorias::find($id);
    $descricoes = Descricoes::where('categoria_id',$categoria->id)->get();
    $documentos = Documentos::where('categoria_id',$categoria->id)->get();

    return view('usuario.verCategoria',['categoria' => $categoria,'descricoes' => $descricoes,'documentos' => $documentos]);

  }

  public function verUsuario($id){

    $usuario = User::find($id);

    return view('usuario.verUsuario',['usuario' => $usuario]);

  }

  public function verDescricao($id){

    $descricao = Descricoes::find($id);

    return view('usuario.verDescricao',['descricao' => $descricao]);

  }

  public function deletarCategoria(Request $request){

    Categorias::find($request->id)->delete();

    Documentos::where('categoria_id',$request->id)->get()->delete();

    Descricoes::where('categoria_id',$request->id)->get()->delete();

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

    return redirect()->route('usuario.usuarios');

  }

  public function salvarCategoria(Request $request){

    $request->validate([

      'nome' => 'required|string',
      'responsavel' => 'required|string',
      'email' => 'required|string',
      'fone' => 'required|string',
      'bairro' => 'required|string',
      'rua' => 'required|string',
      'numero' => 'required|string'

    ]);

    $categoria = Categorias::find($request->id);

    $categoria->nome = $request->nome;
    $categoria->responsavel = $request->responsavel;
    $categoria->email = $request->email;
    $categoria->fone = $request->bairro;
    $categoria->bairro = $request->bairro;
    $categoria->rua = $request->rua;
    $categoria->numero = $request->numero;

    $categoria->save();

    return redirect()->route('usuario.categorias');

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

    return redirect()->route('usuario.verCategoria',['id' => $descricao->id]);


  }

  public function baixarDocumento($id){

    $documento = Documentos::find($id);

    return response()->download(storage_path('app/documentos_prae').'/'.$documento->rota);

  }

  public function baixarDocumentoAppWS(Request $request){

      return response()->download(asset('docs').'/'.$request->rota));

  }

  public function listaCategoriasAppWS(){

    $categorias = Categorias::all()->pluck('nome');

    return response()->json($categorias->toJson());

  }

  public function categoriaAppWS($id){

    $categorias = Categorias::all();

    foreach($categorias as $categoria){

      $categoria->descricoes = Descricoes::where('categoria_id',$categoria_id)->get();
      $categoria->documentos = Documentos::where('categoria_id',$categoria_id)->get();

    }

    return response()->json($categorias->toJson());

  }

}
