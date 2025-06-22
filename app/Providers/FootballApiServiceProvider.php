<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FootballApiService;

class FootballApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FootballApiService::class, function ($app) {
            return new FootballApiService();
        });
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