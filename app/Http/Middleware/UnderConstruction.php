<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UnderConstruction
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
        if(!isset(Auth::user()->id)){

            return redirect('/auth');
        }else{
            return $next($request);
        }
        
    }
}
