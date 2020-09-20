<?php

namespace App\Models;

use App\Tenant\Traits\ModelBootTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelBootTrait;
    
    protected $fillable = ['name', 'url', 'description'];
}
