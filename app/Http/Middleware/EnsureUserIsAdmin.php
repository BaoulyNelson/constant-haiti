<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/'); // Redirige vers la page d'accueil ou une page d'erreur
        }
        return $next($request);
    }
}
