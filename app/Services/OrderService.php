<?php

namespace App\Services;

use App\Models\Order;
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

    public function ordersByClient()
    {
        $clientId = $this->getClientIdByOrder();

        // return $this->orderRepository->getOrdersByClientId($clientId);
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->orderRepository->getOrderByIdentify($identify);
    }

    public function createNewOrder(array $order)
    {
        $productsOrder = $this->getProductsByOrder($order['products'] ?? []);

        $identify = $this->getIdentifyOrder();
        $total = $this->getTotalOrder($productsOrder);
        $status = Order::STATUS['OPEN'];
        $tenantId = $this->getTenantIdByOrder($order['token_company']);
        $comment = isset($order['comment']) ? $order['comment'] : '';
        $clientId = $this->getClientIdByOrder();
        $tableId = $this->getTableIdByOrder($order['table'] ?? '');

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $status,
            $tenantId,
            $comment,
            $clientId,
            $tableId
        );

        // $this->orderRepository->registerProductsOrder($order->id, $productsOrder);

        return $order;
    }

    private function getIdentifyOrder(int $qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;
        // $specialCharacters = str_shuffle('!@#$%*-');
        // $characters = $smallLetters.$numbers.$specialCharacters;
        $characters = $smallLetters.$numbers;
        $identify = substr(str_shuffle($characters), 0, $qtyCaraceters);

        if ($this->orderRepository->getOrderByIdentify($identify)) {
            $this->getIdentifyOrder($qtyCaraceters + 1);
        }

        return $identify;
    }

    private function getProductsByOrder(array $productsOrder): array
    {
        $products = [];
        foreach ($productsOrder as $productOrder) {
            $product = $this->productRepository->getByUuid($productOrder['identify']);

            array_push($products, [
                'id' => $product->id,
                'qty' => $productOrder['qty'],
                'price' => $product->price,
            ]);
        }

        return $products;
    }

    private function getTotalOrder(array $products): float
    {
        $total = 0;

        foreach ($products as $product) {
            $total += ($product['price'] * $product['qty']);
        }

        return (float) $total;
    }

    private function getTenantIdByOrder(string $uuid)
    {
        $tenant = $this->tenantRepository->getByUuid($uuid);
        return $tenant->id;
    }

    private function getTableIdByOrder(string $uuid = '')
    {
        if ($uuid) {
            $table = $this->tableRepository->getByUuid($uuid);
            return $table->id;
        }

        return '';
    }

    private function getClientIdByOrder()
    {
        return auth()->check() ? auth()->user()->id : '';
    }


}
