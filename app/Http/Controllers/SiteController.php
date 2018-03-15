<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function telaCadastro(){

        return view('cadastro');

    }

    public function cadastrar(Request $request){


    }

    public function telaLogin(){

      return view('login');

    }

    public function login(Request $request){

      $request->validate([

        'usuario' => 'required|unique:usuarios,usuario',
        'senha' => 'required|min:6|max:50|confirmed',

      ])

      $user = User::where('usuario',$request->usuario)->first();

      if( Hash::check($request->senha, Auth::user()->senha) ){

         Auth::loginUsingId(Auth::user->id);

      }else{

        return redirect()->route('login',['message' => 'Erro no login']);

      }

    }

    public function logout(){

      Auth::logout();

      return redirect()->route('login');

    }
}
