<?php

namespace App\Services;

use App\Repositories\Contracts\IOrderRepository;
use App\Repositories\Contracts\IProductRepository;
use App\Repositories\Contracts\ITableRepository;
use App\Repositories\Contracts\ITenantRepository;

class OrderService
{

    protected $orderRepository, $tenantRepository, $tableRepository, $productRepository;

    public function __construct(
        IOrderRepository $orderRepository,
        ITenantRepository $tenantRepository,
        ITableRepository $tableRepository,
        IProductRepository $productRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->tenantRepository = $tenantRepository;
        $this->tableRepository = $tableRepository;
        $this->productRepository = $productRepository;
    }

    public function createNewOrder(array $oder)
    {

    }


}
