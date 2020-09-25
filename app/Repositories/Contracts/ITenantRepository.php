<?php

namespace App\Repositories\Contracts;

interface ITenantRepository {

    public function getAll();
    public function getByUuid(string $uuid);
}
