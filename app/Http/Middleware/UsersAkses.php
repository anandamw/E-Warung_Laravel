<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah user sudah login dan role sesuai
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // Kembalikan halaman 404 jika akses ditolak
        abort(404); // Lebih baik gunakan abort() untuk menghindari view langsung
    }
}
