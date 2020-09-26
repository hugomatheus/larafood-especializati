<?php

namespace App\Repositories\Contracts;

interface IProductRepository {

    public function getAllByTenantUuid(string $tenantUuid, array $categories);
    public function getByFlag(string $flag);
}
