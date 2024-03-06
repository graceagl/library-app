<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Jika pengguna tidak terautentikasi, alihkan ke halaman login
            return redirect()->route('login');
        }

        // Periksa apakah pengguna memiliki peran yang diizinkan
        if (!Auth::user()->hasRole($role)) {
            // Jika tidak, kembalikan respon terlarang
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
