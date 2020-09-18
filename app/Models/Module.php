<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'description'];

    // Relationships:

    //   - Get Permission:

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
        // Caso não seja respeitado o padrão de nomeclatura do  Laravel
        //return $this->belongsToMany(Permission::class, 'nome_da_tabela');
    }



    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('description', 'LIKE', "%$filter%")
                        ->paginate();
        return $results;
    }

    public function permissionsAvailable()
    {
        $permissions = Permission::whereNotIn('id', function($query) {
                                $query->select('ModulePermission.permission_id');
                                $query->from('module_permission AS ModulePermission');
                                $query->where('ModulePermission.module_id', $this->id);
                        })->paginate();

        return $permissions;
    }
}
