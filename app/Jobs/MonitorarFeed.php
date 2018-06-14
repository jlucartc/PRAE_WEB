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

      $xml = simplexml_load_string($res->getBody());

      $xml = json_decode(json_encode($xml),true);

      $itens = $xml['channel']['item'];

      foreach($itens as $item){

        if(Noticias::where('guid',$item['guid'])->get()->count() == 0){

          $noticia = new Noticias;

          $noticia->titulo = $item['title'];
          $noticia->guid = $item['guid'];
          $status = $noticia->save();

          $optionBuilder = new OptionsBuilder();

          $notificationBuilder = new PayloadNotificationBuilder('Nova notícia');
          $notificationBuilder->setBody($noticia->titulo)->setSound('default');

          $dataBuilder = new PayloadDataBuilder();

          $option = $optionBuilder->build();
          $notification = $notificationBuilder->build();
          $data = $dataBuilder->build();

          // You must change it to get your tokens
          $token = "AAAA3Y8d3c4:APA91bGwu4OA7VcUg5mpz4oBM5lHtQER8s_tjVTegcNgmLoKDmVFJjRwj-ma9xkih3b1IU-8ZdZGYKFiLLNX2ae3LwpBXiReOWD4ooL742Yd63BWDj_kGVi5ipxjE9z_h1PpbanI3zyN";

          $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

          if($downstreamResponse->numberFailure() > 0){

            $downstreamResponse->tokensToRetry($token);

          }

        }

      }

    }catch(HttpException $e){

      echo $e->getMessage();

    }

  }
}
