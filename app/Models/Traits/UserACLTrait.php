<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait {


    public function getUserPermissions()
    {
        $getPlanPermissions = $this->getPlanPermissions();
        $getRolePermissions = $this->getRolePermissions();

        return array_unique(array_intersect($getPlanPermissions, $getRolePermissions));
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

        return $permissions;
    }

    public function getRolePermissions()
    {
        $roles = $this->roles()->with(['permissions'])->get();
        $permissions = [];

        foreach($roles as $role)
        {
            foreach($role->permissions as $permission)
            {
                array_push($permissions, $permission->name);
            }
        }
        return $permissions;
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
