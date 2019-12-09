<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class StockServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\StockRepositoryInterface',
            'App\Repositories\StockRepository'
        );
    }
}
