<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->role=='1') {
                //return redirect(RouteServiceProvider::HOME);
                return redirect('/admin/dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role=='0') {
                //return redirect(RouteServiceProvider::HOME);
                return redirect('/user/dashboard');
            } else{
                return  $next($request);
            }
        }
    }
}
