<?php

namespace App\Models;

use App\Tenant\Traits\ModelBootTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelBootTrait;

    protected $fillable = ['name', 'url', 'description'];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('description', 'LIKE', "%$filter%")
                        ->paginate();

        return $results;
    }
}
