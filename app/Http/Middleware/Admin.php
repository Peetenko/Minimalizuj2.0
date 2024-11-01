<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if(isset(Auth::user()->id) && Auth::user()->id === 2 || Auth::user()->id === 1 ){
            return $next($request);
        }else{
            return redirect('/auth');
        }
        
    }
}
