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
}
