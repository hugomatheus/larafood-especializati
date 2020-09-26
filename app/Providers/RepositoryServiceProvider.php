<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryQueryBuilder;
use App\Repositories\Contracts\ICategoryRepository;
use App\Repositories\Contracts\ITenantRepository;
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
