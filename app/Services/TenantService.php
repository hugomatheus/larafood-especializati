<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\ITenantRepository;

class TenantService
{
    private $plan;
    private $data = [];
    private $tenantRepository;

    public function __construct(ITenantRepository $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
    }

    public function getAll(int $per_page)
    {
        return $this->tenantRepository->getAll($per_page);
    }

    public function getByUuid(string $uuid)
    {
        return $this->tenantRepository->getByUuid($uuid);
    }

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();
        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant()
    {
        $tenant = $this->plan->tenants()->create([
            'cnpj' => $this->data['cnpj'],
            'name' => $this->data['company'],
            'email' => $this->data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);

        return $tenant;
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }

}

