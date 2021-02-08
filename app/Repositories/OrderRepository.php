<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\IOrderRepository;

class OrderRepository implements IOrderRepository {

    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function createNewOrder(string $identify, float $total, string $status, int $tenantId, $clientId = '', $tableId = '')
    {
        
    }

    public function getOrderByIdentify(string $identify)
    {

    }
}
