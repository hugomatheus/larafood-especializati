<?php

namespace App\Repositories\Contracts;

interface ITenantRepository {

    public function getAll(int $per_page);
    public function getByUuid(string $uuid);
}
