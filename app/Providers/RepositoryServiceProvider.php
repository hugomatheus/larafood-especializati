<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryQueryBuilder;
use App\Repositories\ClientRepository;
use App\Repositories\Contracts\ICategoryRepository;
use App\Repositories\Contracts\IClientRepository;
use App\Repositories\Contracts\IOrderRepository;
use App\Repositories\Contracts\IProductRepository;
use App\Repositories\Contracts\ITableRepository;
use App\Repositories\Contracts\ITenantRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepositoryQueryBuilder;
use App\Repositories\TableRepositoryQueryBuilder;
use App\Repositories\TenantRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ITenantRepository::class, TenantRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepositoryQueryBuilder::class);
        $this->app->bind(ITableRepository::class, TableRepositoryQueryBuilder::class);
        $this->app->bind(IProductRepository::class, ProductRepositoryQueryBuilder::class);
        $this->app->bind(IClientRepository::class, ClientRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
