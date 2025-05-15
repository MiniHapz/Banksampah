<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek user login & role
        if (Auth::check() && Auth::user()->role === 'admin') {  // Ganti 'role' sesuai kolom
            return $next($request);
        }
        
        return redirect('/dashboard')->with('error', 'Akses ditolak!');
    }
}
