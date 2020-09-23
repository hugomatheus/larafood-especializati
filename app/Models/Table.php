<?php

namespace App\Models;

use App\Tenant\Traits\ModelBootTrait;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use ModelBootTrait;

    protected $fillable = ['identify', 'description'];

     // Relationships:

     public function tenant()
     {
         return $this->belongsTo(Tenant::class);
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
