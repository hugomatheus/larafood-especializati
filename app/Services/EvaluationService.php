<?php

namespace App\Services;

use App\Repositories\Contracts\IEvaluationRepository;
use App\Repositories\Contracts\IOrderRepository;

class EvaluationService
{
    protected $evaluationRepository;
    protected $orderRepository;

    public function __construct(IEvaluationRepository $evaluationRepository, IOrderRepository $orderRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
        $this->orderRepository = $orderRepository;
    }

    public function createNewEvaluation(string $identifyOrder, array $evaluation)
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);

        return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId, $evaluation);
    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }


}
