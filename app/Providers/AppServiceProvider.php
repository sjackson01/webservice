<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register singleton and return client 
     * object for dependency injection 
     * @return Client
     */
    public function register()
    {

        $this->app->singleton('GuzzleHttp\Client', function($api) {
            return new Client();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
