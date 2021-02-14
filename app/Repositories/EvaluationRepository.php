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

    }

    public function getEvaluationsByOrder(int $idOrder)
    {

    }

    public function getEvaluationsByClient(int $idClient)
    {

    }

    public function getEvaluationsById(int $id)
    {

    }

    public function getEvaluationsByClientIdByOrderId(int $idOrder, int $idClient)
    {

    }

}
