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
use App\Secoes;
use App\Listas;
use App\Paragrafos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use HTTP_Request2;

class WebServiceController extends Controller
{
  public function baixarDocumentoAppWS(Request $request){

      return response()->download(asset('docs').'/'.$request->rota);

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

  public function categoriasAppWS($tipo){

    $categorias = Categorias::where('tipo_categoria',$tipo)->get();

    return response()->json($categorias);

  }

  public function secoesAppWS($categoriaId){

      $secoes = Secoes::where('categoria_id',$categoriaId)->get();

      return response()->json($secoes);

  }

  public function paragrafosAppWS($secaoId){

    $paragrafos = Paragrafos::where('secao_id',$secaoId)->get();

    $paragrafos->each(function($item,$key){

      $item->listas = Listas::where('paragrafo_id',$item->id)->get();

      $item->listas->each(function($itemListas,$keyListas){

        $itemListas->itens = Itens::where('lista_id',$itemListas->id)->get();

      });

    });

    return response()->json($paragrafos);

  }

  public function documentosAppWS($secaoId){

    $documentos = Documentos::where('secao_id',$secaoId)->get();

    return response()->json($documentos);

  }

  public function compromissosAppWS(Request $request){

    $compromissos = Compromissos::all();

    return response()->json($compromissos);

  }

  public function mapasAppWS(Request $request){

    $mapas = Mapas::all();

    return response()->json($mapas);

  }

  public function mostrarMapaAppWS($id){

    $nome = Mapas::find($id)->nome;

    return response()->file(storage_path()."/app/mapas_prae/".$nome);

  }

}
