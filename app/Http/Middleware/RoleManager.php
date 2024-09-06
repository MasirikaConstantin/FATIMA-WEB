<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
{
    if (!Auth::check()) {
        session()->put('url.intended', $request->url()); // Stocker l'URL actuelle
        return redirect()->route('login');
    }

    $autUser = Auth::user()->role;
    switch ($role) {
        case 'admin':
            if ($autUser == 0) {
                return $next($request);
            }
            break;
        case "utilisateur":
            if ($autUser == 1) {
                return $next($request);
            }
            break;
        case "autres":
            if ($autUser == 2) {
                return $next($request);
            }
            break;
    }

    switch ($autUser) {
        case 0:
            return redirect()->intended(); // Redirige vers la page d'origine ou par défaut
        case 1:
            return redirect()->intended(); // Redirige vers la page d'origine ou par défaut
        case 2:
            return redirect()->intended(); // Redirige vers la page d'origine ou par défaut
    }
    
    return redirect()->route('login');
}

}