<?php

namespace App\Services;

use App\Repositories\Contracts\ITableRepository;

class TableService
{
    private $tableRepository;
    public function __construct(ITableRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    public function getAllByTenantUuid(string $tenantUuid)
    {
        return $this->tableRepository->getAllByTenantUuid($tenantUuid);
    }

    public function getByIdentify(string $url)
    {
        return $this->tableRepository->getByIdentify($url);
    }
}
