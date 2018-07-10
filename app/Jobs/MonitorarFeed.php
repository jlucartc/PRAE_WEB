<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Noticias;
use App\ReceiverID;
use HTTP_Request2;
use Illuminate\Support\Facades\Log;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

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

      Log::info("MonitorarFeed executado!");

      $xml = simplexml_load_string($res->getBody());

      $xml = json_decode(json_encode($xml),true);

      $itens = $xml['channel']['item'];

      $itens = array_reverse($itens);

      foreach($itens as $item){

        if(Noticias::where('guid',$item['guid'])->get()->count() == 0){

          $noticia = new Noticias;

          $noticia->titulo = $item['title'];
          $noticia->guid = $item['guid'];
          $status = $noticia->save();

          /*$optionBuilder = new OptionsBuilder();


          $dataBuilder = new PayloadDataBuilder();

          $dataBuilder->addData([
              'title' => "Nova notícia",
              'body' => $noticia->titulo,
              'guid' => $noticia->guid
          ]);

          $option = $optionBuilder->build();
          //$notification = $notificationBuilder->build();
          $data = $dataBuilder->build();

          //Log::info("Data: ",$data);

          // You must change it to get your tokens
          $token = ReceiverID::first()->receiverID;

          Log::info("Token ID: ".$token);

          Log::info("Data: ".json_encode($dataBuilder->getData()));

          $downstreamResponse = FCM::sendTo($token, $option, null , $data);

          if($downstreamResponse->numberFailure() > 0){

            $downstreamResponse->tokensToRetry($token);

          }*/

        }

      }

    }catch(HttpException $e){

      echo $e->getMessage();

    }

  }
}
