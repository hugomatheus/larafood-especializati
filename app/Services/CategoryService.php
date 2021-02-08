<?php

namespace App\Services;

use App\Repositories\Contracts\ICategoryRepository;

class CategoryService
{
    private $categoryRepository;
    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllByTenantUuid(string $tenantUuid)
    {
        return $this->categoryRepository->getAllByTenantUuid($tenantUuid);
    }

    public function getByUuid(string $uuid)
    {
        return $this->categoryRepository->getByUuid($uuid);
    }
}
