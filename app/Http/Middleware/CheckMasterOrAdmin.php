<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMasterOrAdmin
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
        // jika login dan role user adalah admin
        if (Auth::user() && Auth::user()->role == 'admin' || Auth::user()->role == 'master') {
            // diizinkan
            return $next($request);
            // return redirect()->route('restaurant.show', Auth::user()->restaurant->slug);
        }

        return redirect()->route('index');
    }
}
