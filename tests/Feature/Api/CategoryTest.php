<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Error get all categories by tenant
     *
     * @return void
     */
    public function testErrorGetAllCategoriesByTenant()
    {
        $response = $this->getJson('/api/v1/categories');

        $response->assertStatus(422);
    }

    /**
     * Get all categories by tenant
     *
     * @return void
     */
    public function testGetAllCategoriesByTenant()
    {

        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories?token_company=$tenant->uuid");

        $response->assertStatus(200);
    }

    /**
     * Error get category by uuid
     *
     * @return void
     */
    public function testErrorGetCategoryByUuid()
    {

        $tenant = factory(Tenant::class)->create();
        $categoryUuid = 'fake-uuid';

        $response = $this->getJson("/api/v1/categories/$categoryUuid?token_company=$tenant->uuid");

        $response->assertStatus(404);
    }

    /**
     * Get category by uuid
     *
     * @return void
     */
    public function testGetCategoryByUuid()
    {

        $tenant = factory(Tenant::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->getJson("/api/v1/categories/$category->uuid?token_company=$tenant->uuid");

        $response->assertStatus(200);
    }
}
