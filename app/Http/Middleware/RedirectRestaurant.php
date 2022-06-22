<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class RedirectRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // not logged ATAU yg login dan rolenya bukan admin
        if (!Auth::user() || (Auth::user() && Auth::user()->role == 'master') || (Auth::user() && Auth::user()->role == 'user')) {
            return $next($request);
        }
        
        return redirect("/restaurant/show/".Auth::user()->restaurant->slug);
    }
}
