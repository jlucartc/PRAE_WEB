<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Noticias;
use HTTP_Request2;
use Illuminate\Support\Facades\Log;

class MonitorarFeed implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
  * Create a new job instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {

    $http = new HTTP_Request2('http://prae.ufc.br/feed/',HTTP_Request2::METHOD_GET);
    $http->setMethod('GET');
    $http->setConfig(array('follow_redirects' => true));
    $res = $http->send();

    try{

      $xml = simplexml_load_string($res->getBody());

      $xml = json_decode(json_encode($xml),true);

      $itens = $xml['channel']['item'];

      foreach($itens as $item){

        if(Noticias::where('guid',$item['guid'])->get()->count() == 0){

          $noticia = new Noticias;

          $noticia->titulo = $item['title'];
          $noticia->guid = $item['guid'];
          $status = $noticia->save();

        }

      }

    }catch(HttpException $e){

      echo $e->getMessage();

    }

  }
}
