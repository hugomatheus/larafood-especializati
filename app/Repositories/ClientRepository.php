<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\IClientRepository;

class ClientRepository implements IClientRepository
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createNewClient(array $data)
    {
        return $this->client->create($data);
    }

    public function getClient(int $id)
    {

    }

}
