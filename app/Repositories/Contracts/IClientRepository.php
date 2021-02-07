<?php

namespace App\Repositories\Contracts;

interface IClientRepository {

    public function createNewClient(array $data);
    public function getClient(int $id);
}
