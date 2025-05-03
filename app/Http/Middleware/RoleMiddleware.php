<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Ensure the user is authenticated

        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }
        // Check if the user's role matches any of the passed roles
        if (!in_array(Auth::user()->role->name, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
