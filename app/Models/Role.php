<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];
    const ROLE_ADMIN_TENANT = 1;

    // Relationships:

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //--- Relationships:

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('description', 'LIKE', "%$filter%")
                        ->paginate();
        return $results;
    }

    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
                                    $query->select('permission_role.permission_id');
                                    $query->from('permission_role');
                                    $query->where('permission_role.role_id', $this->id);
                                  })
                                    ->where(function($queryFilter) use ($filter) {
                                        if($filter){
                                            $queryFilter->where('permissions.name', 'LIKE', "%$filter%");
                                        }
                                  })
                                ->paginate();
        return $permissions;
    }
}
