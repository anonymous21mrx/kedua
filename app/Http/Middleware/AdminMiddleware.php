<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah session 'admin_logged_in' TIDAK ADA di browser 
        if (!Session::has('admin_logged_in')) {
            // Jika belum login, tendang ke halaman login dengan pesan error 
            return redirect()->route('login')->withErrors(['login_error' => 'Anda harus login terlebih dahulu untuk mengakses halaman ini!']);
        }

        // Jika sudah login, ijinkan akses ke rute admin 
        return $next($request);
    }
}