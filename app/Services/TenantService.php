<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Facades\App;

class TenantService
{
    protected $tenant;

    public function setTenant(Tenant $tenant): self
    {
        $this->tenant = $tenant;

        return $this;
    }

    public function getTenant(): ?Tenant
    {
        return $this->tenant;
    }

    public function loadTenant(string $host): self
    {
        $this->setTenant(Tenant::where('domain', $this->extractSubDomain($host))->firstOrFail());
        $this->setTenantGlobally();

        return $this;
    }

    private function setTenantGlobally(): void
    {
        App::singleton('tenant', function () {
            return $this->getTenant();
        });
    }

    private function extractSubDomain(string $host): string
    {
        return explode('.', $host)[0];
    }
}
