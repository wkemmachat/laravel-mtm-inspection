<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleFgMiddleware
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
        if(!Auth::check()){

            return redirect()->back();

        }else if(strcasecmp(Auth::user()->role,'fg')==0||strcasecmp(Auth::user()->role,'root')==0){

            return $next($request);

        }else {

            return redirect()->back();

        }

    }
}
