<?php

namespace App\Providers;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryBindingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
