<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait {


    public function getUserPermissions()
    {
        $getPlanPermissions = $this->getPlanPermissions();

        return $getPlanPermissions;
    }

    public function getPlanPermissions(): array
    {
        $tenant = Tenant::with(['plan.modules.permissions'])->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach($plan->modules as $module)
        {

            foreach($module->permissions as $permission)
            {
                array_push($permissions, $permission->name);
            }
        }

        return array_unique($permissions);
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->getUserPermissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
