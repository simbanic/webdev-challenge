<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class AuctionStockFileServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\AuctionStockFileRepositoryInterface',
            'App\Repositories\AuctionStockFileRepository'
        );
    }
}
