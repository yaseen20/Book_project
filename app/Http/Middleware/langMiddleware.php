<?php

namespace App\Http\Middleware;

use Closure;

class langMiddleware
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

     if(session::has('lang')){

       // App::setlocale(Session::get('lang'));
        app()->setlocale(Session::get('lang'));
     }

        return $next($request);
    }
}
