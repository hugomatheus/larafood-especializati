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

    public function getAll(int $per_page)
    {
        return $this->tenant->paginate($per_page);
    }

    public function getByUuid(string $uuid)
    {
        return $this->tenant->where('uuid', $uuid)->first();
    }
}
