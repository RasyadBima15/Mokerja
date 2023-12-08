<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
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
        // Memeriksa apakah pengguna terotentikasi dan memiliki peran 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        } elseif(Auth::check() && Auth::user()->role == 'pelamar' || Auth::user()->role == 'penyedia'){
            abort(401);
        }
        // Jika tidak, arahkan ke rute yang sesuai (misalnya, halaman login)
        return redirect()->route('adminLogin');
    }
}
