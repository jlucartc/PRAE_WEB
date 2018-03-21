<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categorias;

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

}
