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
use App\Emails;
use App\Mail\CancelarNotificacoesEmail;
use App\Mail\ConfirmarCadastroEmail;
use App\Mail\EmailNotificacao;
use Illuminate\Support\Facades\Mail;
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

    $noticias->each(function($item,$key){

      unset($item->token);
      unset($item->created_at);
      unset($item->updated_at);

    });

    return response()->json($noticias);

  }

  public function categoriasAppWS($tipo){

    $categorias = Categorias::where('tipo_categoria',$tipo)->get();

    $categorias->each(function($item,$key){

      unset($item->created_at);
      unset($item->updated_at);

    });

    return response()->json($categorias);

  }

  public function secoesAppWS($categoriaId){

      $secoes = Secoes::where('categoria_id',$categoriaId)->get();

      $secoes->each(function($item,$key){

        unset($item->created_at);
        unset($item->updated_at);

      });

      return response()->json($secoes);

  }

  public function paragrafosAppWS($secaoId){

    $paragrafos = Paragrafos::where('secao_id',$secaoId)->get();

    $paragrafos->each(function($item,$key){

      unset($item->created_at);
      unset($item->updated_at);

      $item->listas = Listas::where('paragrafo_id',$item->id)->get();

      $item->listas->each(function($itemListas,$keyListas){

        unset($itemListas->created_at);
        unset($itemListas->updated_at);

        $itemListas->itens = Itens::where('lista_id',$itemListas->id)->get();

      });

    });

    return response()->json($paragrafos);

  }

  public function documentosAppWS($categoriaId){

    $documentos = Documentos::where('categoria_id',$categoriaId)->get();

    $documentos->each(function($item,$key){

      unset($item->created_at);
      unset($item->updated_at);

    });

    return response()->json($documentos);

  }

  public function compromissosAppWS(Request $request){

    $compromissos = Compromissos::all();

    $compromissos->each(function($item,$key){

      unset($item->created_at);
      unset($item->updated_at);

    });

    return response()->json($compromissos);

  }

  public function mapasAppWS(Request $request){

    $mapas = Mapas::all();

    $mapas->each(function($item,$key){

      unset($item->created_at);
      unset($item->updated_at);

    });

    return response()->json($mapas);

  }

  public function mostrarMapaAppWS($id){

    $nome = Mapas::find($id)->nome;

    return response()->file(storage_path()."/app/mapas_prae/".$nome);

  }

  public function cadastrarEmail($email){

      $nEmail = new Emails();

      $nEmail->email = $email;
      $nEmail->token = str_random(40);

      $nEmail->save();

      Mail::to($email)->send(new ConfirmarCadastroEmail($nEmail));

  }

  public function notificarEmails($noticiaId){

    $emails = Emails::all();

    foreach($emails as $email){

      Log::info("Notificando emails!");

      $noticia = Noticias::find($noticiaId);

      Mail::to($email->email)->send(new EmailNotificacao($noticia,$email));

    }

      //Mail::to("praeapp.teste@gmail.com")->send(new EmailNotificacao($noticia));

  }


  public function cancelarNotificacoesEmail(Request $request){

    $nEmail = Emails::where("token",$request->token)->first();

    Mail::to($nEmail->email)->send(new CancelarNotificacoesEmail($nEmail));

    $nEmail->delete();

  }

}
