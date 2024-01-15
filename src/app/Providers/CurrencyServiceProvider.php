<?php

namespace PostorShop\CurrencyModules\app\Providers;

use Illuminate\Support\ServiceProvider;
use PostorShop\CurrencyModules\app\Repositories\CurrencyRepository;
use PostorShop\CurrencyModules\app\Repositories\Interfaces\CurrencyRepositoryInterface;


class CurrencyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register(): void
    {
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
    }
}
