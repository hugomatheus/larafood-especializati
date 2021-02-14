<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\IEvaluationRepository;
use App\Tenant\Scopes\TenantScope;

class EvaluationRepository implements IEvaluationRepository
{
    protected $evaluation;
    public function __construct(Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;
    }

    public function newEvaluationOrder(int $idOrder, int $idClient, array $evaluation)
    {
        $data = [
            'client_id' => $idClient,
            'order_id' => $idOrder,
            'stars' => $evaluation['stars'],
            'comment' => isset($evaluation['comment']) ? $evaluation['comment'] : '',
        ];

        return $this->evaluation->create($data);
    }

    public function getEvaluationsByOrder(int $idOrder)
    {
        return $this->evaluation->where('order_id', $idOrder)->get();
    }


    public function getEvaluationsByClient(int $idClient)
    {
        return $this->evaluation->where('client_id', $idClient)->get();
    }

    public function getEvaluationsById(int $id)
    {
        return $this->evaluation->find($id);
    }

    public function getEvaluationsByClientIdByOrderId(int $idOrder, int $idClient)
    {
        return $this->evaluation->where('client_id', $idClient)->where('order_id', $idOrder)->first();
    }
}
