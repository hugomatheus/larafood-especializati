<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    // Relationships:

    //   - Get Module:

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // -- Relationships:

    public function search($filter) {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('description', 'LIKE', "%$filter%")
                        ->paginate();
        return $results;
    }
}
