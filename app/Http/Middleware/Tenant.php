<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\TenantService;

class Tenant
{
    public function __construct(
        protected TenantService $tenantService
    ) {
    }

    public function handle($request, Closure $next)
    {
        $this->tenantService->loadTenant($request->getHost());
        return $next($request);
    }
}
