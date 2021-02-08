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

    public function createNewOrder(string $identify, float $total, string $status, int $tenantId, string $comment, $clientId = '', $tableId = '')
    {
        $data = [
            'tenant_id' => $tenantId,
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'comment' => $comment,
        ];

        if ($clientId) $data['client_id'] = $clientId;
        if ($tableId) $data['table_id'] = $tableId;

        $order = $this->entity->create($data);
        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {

    }
}
