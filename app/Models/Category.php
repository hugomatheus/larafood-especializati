<?php

namespace App\Models;

use App\Tenant\Traits\ModelBootTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelBootTrait;

    protected $fillable = ['name', 'url', 'description'];

    // Relationships:

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    //--- Relationships:

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('description', 'LIKE', "%$filter%")
                        ->paginate();

        return $results;
    }
}
