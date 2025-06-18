<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('kre') && session('kre') != '1234567890') {
            // Jika tidak ada session 'kre', redirect ke halaman login (atau lainnya)
            return redirect('/')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
