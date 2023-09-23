<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Inertia\Inertia;

class RedierctIfTenantUser
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->hasRole(User::USER)) {
            return redirect('/user-dashboard');
        }

        return $next($request);
    }
}
