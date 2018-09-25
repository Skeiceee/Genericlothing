<?php

namespace genericlothing\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Session;
use Closure;

class PermisosMiddleware
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
      $estado = auth()->user()->estado;
      if($estado != 2){
          return redirect("login");
      }else{
        return $next($request);
      }
    }
}
