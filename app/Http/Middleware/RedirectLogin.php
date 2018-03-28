<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      $response = $next($request);

      if( !Auth::check() ){

        return redirect()->route('index')->with('mensagem','Acesso não autorizado');

      }

      return $response;

    }
}
