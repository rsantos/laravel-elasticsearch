<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticsearch\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Client::class, function() {
            return ClientBuilder::create()->build();
        });
    }
}
