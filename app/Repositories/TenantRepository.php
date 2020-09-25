<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Contracts\ITenantRepository;

class TenantRepository implements ITenantRepository {

    private $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function getAll()
    {
        return $this->tenant->all();
    }

    public function getByUuid(string $uuid)
    {
        return $this->tenant->where('uuid', $uuid)->first();
    }
}
