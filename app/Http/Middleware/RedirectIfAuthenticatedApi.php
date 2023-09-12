<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedApi
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Usuario autenticado, puedes aplicar tu lógica aquí
            return response()->json(['message' => 'Ya estás autenticado en la API'], 403);
        }

        return $next($request);
    }
}
