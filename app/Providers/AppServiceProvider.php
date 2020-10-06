<?php

namespace App\Providers;

use App\Support\Crawler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Crawler::class, function () {
            return new Crawler();
        });
    }
}
