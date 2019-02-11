<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SiteExternoController extends Controller
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

      return redirect()->route('sistema.usuarios');

    }

    public function logout(){

      Auth::logout();

      return redirect()->route('index');

    }

    public function aplicativoDownload(){

        return view('appDownload');

    }

    public function aplicativoDownloadApk(){

        return response()->download(storage_path('app/aplicativo').'/aplicativoprae.apk');

    }

}
