<?php

namespace App\Services;

use App\Repositories\Contracts\IProductRepository;

class ProductService
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllByTenantUuid(string $tenantUuid, array $categories)
    {
        return $this->productRepository->getAllByTenantUuid($tenantUuid, $categories);
    }

    public function getByFlag(string $flag)
    {
        return $this->productRepository->getByFlag($flag);
    }





}

