<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

    public function telaLogin(){
      return view('login');

    }

    public function login(Request $request){

      $request->validate([

        'usuario' => 'required|exists:usuarios',
        'senha' => 'required',

      ]);

      $user = User::where('usuario',$request->usuario)->first();

      if( Hash::check($request->senha,$user->senha) ){

         Auth::loginUsingId($user->id);

      }else{

        return redirect()->route('index')->with('mensagem','Erro no login');

      }

      return redirect()->route('usuario.categorias');

    }

    public function logout(){

      Auth::logout();

      return redirect()->route('index');

    }

}
