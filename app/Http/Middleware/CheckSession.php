<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession
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
        if(session()->has('status')){
            return $next($request);
        }else{
            session()->flash('login-error', 'Please login');
            return redirect('/');
        }
    }
}
