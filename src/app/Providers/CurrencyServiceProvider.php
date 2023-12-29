<?php

namespace PostorShop\CurrencyModules\app\Providers;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
