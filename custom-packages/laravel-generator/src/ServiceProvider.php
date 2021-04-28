<?php

namespace MetasisMedia\LaravelGenerator;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use MetasisMedia\LaravelGenerator\Commands\Destroy;
use MetasisMedia\LaravelGenerator\Commands\Make;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->commands([
            Make::class,
            Destroy::class,
        ]);
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/resources/stubs', 'LaravelGenerator');

        $this->publishes([
            __DIR__.'/resources/stubs' => resource_path('vendor/metasismedia/laravel-generator/stubs'),
        ]);
    }
}
