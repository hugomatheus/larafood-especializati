<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\ICategoryRepository;
use App\Tenant\Scopes\TenantScope;

class CategoryRepository implements ICategoryRepository
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllByTenantUuid(string $tenantUuid)
    {
        $categories = $this->category->join('tenants', 'tenants.id', 'categories.tenant_id')
                        ->where('tenants.uuid', $tenantUuid)
                        ->select('categories.*')
                        ->withoutGlobalScope(TenantScope::class)
                        ->get();
        return $categories;
    }

    public function getAllByTenantId(int $tenantId)
    {
        $categories = $this->category->where('tenant_id', $tenantId)
                            ->withoutGlobalScope(TenantScope::class)
                            ->get();
        return $categories;
    }


}
