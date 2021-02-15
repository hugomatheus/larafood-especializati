<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test get all tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/v1/tenants');
        // $response->dump();

        $response->assertStatus(200);
        $response->assertJsonCount(10, 'data');
    }

    /**
     * Test error get tenant by identify
     *
     * @return void
     */
    public function testErrorGetTenant()
    {

        $tenantIdentify = 'fake-identify';

        $response = $this->getJson("/api/v1/tenants/$tenantIdentify");

        $response->assertStatus(404);
    }

    /**
     * Test get tenant by identify
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {

        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tenants/$tenant->uuid");

        $response->assertStatus(200);
    }
}
