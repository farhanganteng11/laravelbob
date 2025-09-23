<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, $roles)
{
    $user = auth()->user();
    $roles = explode(',', $roles); // pisah string menjadi array
    if (!$user || !in_array($user->role, $roles)) {
        abort(403, 'Unauthorized');
    }
    return $next($request);
}
}
