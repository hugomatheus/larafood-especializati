<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait {
    

    public function getUserPermissions()
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
}
