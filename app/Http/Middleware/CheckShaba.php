<?php

namespace App\Http\Middleware;

use Closure;

class CheckShaba
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
        if(!auth()->user()->is_admin() && auth()->user()->shaba == null){
            $request->session()->flash('Error', 'ابتدا پروفایل خود را تکمیل کنید');
            return redirect()->route('Profile');
        }
        return $next($request);
    }
}
