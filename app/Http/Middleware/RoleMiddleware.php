<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

        public function handle($request, Closure $next, $role)
        {
            if (!Auth::check()) {
                return redirect('/login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
            }
    
            if (!$request->user()->hasRole($role)) {
                return redirect('/')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
            }
    
            return $next($request);
        }
}
