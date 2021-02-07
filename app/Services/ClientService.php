<?php

namespace App\Services;

use App\Repositories\Contracts\IClientRepository;

class ClientService
{
    protected $clientRepository;
    public function __construct(IClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function createNewClient(array $data)
    {
        return $this->clientRepository->createNewClient($data);
    }


}
