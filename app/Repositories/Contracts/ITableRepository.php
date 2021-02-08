<?php

namespace App\Repositories\Contracts;

interface ITableRepository {

    public function getAllByTenantUuid(string $tenantUuid);
    public function getAllByTenantId(int $tenantId);
    public function getByUuid(string $uuid);
}
