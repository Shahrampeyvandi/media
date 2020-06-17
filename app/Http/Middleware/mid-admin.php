<?php

namespace App\Http\Middleware;

use Closure;

class midAdmin
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
        if(auth()->user()->ability == 'mid-level-admin' || auth()->user()->ability == 'admin'){
           
            return $next($request);
        }
        return redirect()->route('BaseUrl');
    }
}
