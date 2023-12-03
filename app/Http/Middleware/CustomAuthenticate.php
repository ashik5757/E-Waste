<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()) {
            // session(['show_login_modal' => true]);
            return redirect()->route('home')->with('error', 'Please login to your account');

            // return redirect()->route('home')->with('show_login_modal', true);

        }

        // dd(session('show_login_modal'));

        return $next($request);
    }
}
