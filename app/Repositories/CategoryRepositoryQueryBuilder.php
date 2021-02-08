<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\ICategoryRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepositoryQueryBuilder implements ICategoryRepository
{
    private $db_table;
    public function __construct()
    {
        $this->db_table = 'categories';
    }

    public function getAllByTenantUuid(string $tenantUuid)
    {
        $categories =  DB::table($this->db_table)
                            ->join('tenants', 'tenants.id', 'categories.tenant_id')
                            ->where('tenants.uuid', $tenantUuid)
                            ->select('categories.*')
                            ->get();
        return $categories;
    }

    public function getAllByTenantId(int $tenantId)
    {
        $categories = DB::table($this->db_table)->where('tenant_id', $tenantId)->get();
        return $categories;
    }

    public function getByUuid(string $uuid)
    {
        $category = DB::table($this->db_table)->where('uuid', $uuid)->first();
        return $category;
    }


}
