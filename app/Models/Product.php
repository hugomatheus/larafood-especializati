<?php

namespace App\Models;

use App\Tenant\Traits\ModelBootTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ModelBootTrait;
    protected $fillable = ['title', 'flag', 'image', 'price', 'description'];

    // Relationships:

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // -- Relationships:

    public function search($filter = null)
    {
        $results = $this->where('title', 'LIKE', "$filter")
                        ->orWhere('description', 'LIKE', "$filter")
                        ->paginate();
        return $results;
    }

    public function categoriesAvailable($filter = null)
    {
        $results = Category::whereNotIn('id', function($query) {
                                  $query->select('category_product.category_id');
                                  $query->from('category_product');
                                  $query->where('product_id', $this->id);
                                })
                                ->where(function($queryFilter) use ($filter){
                                    if($filter)
                                    {
                                        $queryFilter->where('name', 'LIKE', "%$filter%");
                                    }
                                })
                                ->paginate();
        return $results;
    }
}
