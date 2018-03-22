<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categorias;
use App\Descricoes;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{

  public function usuarios(){

    $usuarios = User::all();

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

  public function verCategoria($id){

    $categoria = Categorias::find($id);
    $descricoes = Descricoes::where('categoria_id',$categoria->id)->get();

    return view('usuario.verCategoria',['categoria' => $categoria,'descricoes' => $descricoes]);

  }

  public function verUsuario($id){

    $usuario = User::find($id);

    return view('usuario.verUsuario',['usuario' => $usuario]);

  }

  public function verDescricao($id){

    $descricao = Descricoes::find($id);

    return view('usuario.verDescricao',['descricao' => $descricao]);

  }

}
