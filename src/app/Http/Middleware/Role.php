<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        $roles = array_slice(func_get_args(), 2);
        if (! Auth::check()) {
            throw new AuthenticationException;
        }
        $user = Auth::user();
        if (! $user->hasRole($roles)) {
            throw new AuthenticationException;
        }

        return $next($request);
    }
}
