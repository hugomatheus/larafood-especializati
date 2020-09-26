<?php

namespace App\Repositories;

use App\Repositories\Contracts\IProductRepository;
use Illuminate\Support\Facades\DB;

class ProductRepositoryQueryBuilder implements IProductRepository
{
    private $db_table;
    public function __construct()
    {
        $this->db_table = 'products';
    }

    public function getAllByTenantUuid(string $tenantUuid, array $categories)
    {
        $products =  DB::table($this->db_table)
                            ->join('tenants', 'tenants.id', 'products.tenant_id')
                            ->join('category_product', 'category_product.product_id', '=', 'products.id')
                            ->join('categories', 'category_product.category_id', '=', 'categories.id')
                            ->where('tenants.uuid', $tenantUuid)
                            ->where(function ($query) use ($categories) {
                                if(!empty($categories))
                                    $query->whereIn('categories.id', $categories);
                            })
                            ->select('products.*')
                            ->get();
        return $products;
    }

    public function getByFlag(string $flag)
    {
        $product = DB::table($this->db_table)->where('flag',$flag)->first();
        return $product;
    }




}
