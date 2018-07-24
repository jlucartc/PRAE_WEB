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

  public function paragrafoAppWS($id){

    $paragrafo = Paragrafos::find($id);

    $paragrafo->listas = Listas::where('paragrafo_id',$paragrafo->id)->get();

    $paragrafo->listas->each(function($item,$key){

        $item->itens = Itens::where('lista_id',$item->id)->get();

    });

    return response()->json($paragrafo);

  }

  public function secaoAppWS($id){

      $secao = Secoes::find($id);

      $secao->each(function($item,$key){

        $item->paragrafos = Paragrafos::where('secao_id',$item->id)->get();

      });

  }

  public function auxiliosAppWS(Request $request){

    $auxilios = Categorias::where('tipo_categoria',2)->get();

    $auxilios->each(function($item,$key){

        $item->secoes = Secoes::where('categoria_id',$item->id)->get();

        $item->documentos = Documentos::where('categoria_id',$item->id)->get();

    });

    return response()->json($auxilios);

  }

  public function servicosAppWS(Request $request){

    $servicos = Categorias::where('tipo_categoria',3)->get();

    $servicos->each(function($item,$key){

        $item->secoes = Secoes::where('categoria_id',$item->id)->get();

        $item->documentos = Documentos::where('categoria_id',$item->id)->get();

    });

    return response()->json($servicos);

  }

  public function bolsasAppWS(Request $request){

    $bolsas = Categorias::where('tipo_categoria',1)->get();

    $bolsas->each(function($item,$key){

        $item->secoes = Secoes::where('categoria_id',$item->id)->get();

        $item->documentos = Documentos::where('categoria_id',$item->id)->get();

    });

    return response()->json($bolsas);

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
