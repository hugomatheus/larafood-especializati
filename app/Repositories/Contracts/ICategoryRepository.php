<?php

namespace App\Repositories\Contracts;

interface ICategoryRepository {

    public function getAllByTenantUuid(string $tenantUuid);
    public function getAllByTenantId(int $tenantId);
}
