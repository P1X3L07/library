<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param 
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // dd("Middleware triggered for role: $role");
        // if (auth()->check() && auth()->user()->role !== $role) {
        //     return redirect('/home'); // Redirect to home if role does not match
        // }

        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized');
        }
        
        return $next($request);
    }
}
