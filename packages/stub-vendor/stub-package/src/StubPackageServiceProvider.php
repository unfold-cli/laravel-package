<?php

namespace StubVendor\StubPackage;

use Illuminate\Support\ServiceProvider;

class StubPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/stub-package.php' => config_path('stub-package.php'),
            ], 'config');

            /*
            $this->loadViewsFrom(__DIR__.'/../resources/views', 'stub-package');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/stub-package'),
            ], 'views');
            */
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'stub-package');
    }
}
