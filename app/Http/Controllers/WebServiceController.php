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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use HTTP_Request2;

class WebServiceController extends Controller
{
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

  public function listaCoordenadoriasAppWS(){

    $coordenadorias = Coordenadorias::all();

    //$categorias->ids = $categorias->pluck('id');
    //$categorias->nomes = $categorias->pluck('nome');

    foreach($coordenadorias as $coordenadoria){

      $coordenadoria->compromissos = Compromissos::where('coordenadoria_id',$coordenadoria->id)->get();

      $coordenadoria->divisoes = Divisoes::where('coordenadoria_id',$coordenadoria->id)->get();

      $coordenadoria->mapas = Mapas::where('coordenadoria_id',$coordenadoria->id)->get();

    }

    return response()->json([$coordenadorias])->withHeaders([
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

  public function noticiasAppWS(){

    Log::info('noticias');

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

    $noticias = Noticias::all();
    //$noticias = $noticias->sortByDesc('id');

    //$noticias = $noticias->slice(($noticias->count()-10));

    return response()->json($noticias);

  }

  public function atualizarReceiverID(Request $request){

    Log::info("receiverID: ".$request->receiverID);

    $id = $request->receiverID;

    $receiverID = ReceiverID::first();

    if(is_null($receiverID) || $receiverID->count() == 0){

      $receiverID = new ReceiverID();

      $receiverID->receiverID = $request->receiverID;

      $receiverID->save();

    }else{

      $receiverID->receiverID = $request->receiverID;

      $receiverID->save();

    }

    return redirect()->route("index");

  }
}
