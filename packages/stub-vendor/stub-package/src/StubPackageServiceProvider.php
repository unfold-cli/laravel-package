<?php

namespace StubVendor\StubPackage;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class StubPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Config
        |--------------------------------------------------------------------------
        */
        $this->publishes([
            __DIR__ . '/../config/stub-package.php' => config_path('stub-package.php'),
        ], 'config');


        /*
        |--------------------------------------------------------------------------
        | Directives
        |--------------------------------------------------------------------------
        */
//        Blade::directive('datetime', function ($expression) {
        /*            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";*/
//        });
//
//        Blade::if('env', function ($environment) {
//            return app()->environment($environment);
//        });


        /*
        |--------------------------------------------------------------------------
        | Migrations
        |--------------------------------------------------------------------------
        */
//        $this->loadMigrationsFrom(__DIR__ . '/path/to/migrations');


        /*
        |--------------------------------------------------------------------------
        | Translations
        |--------------------------------------------------------------------------
        */

//        $this->loadTranslationsFrom(__DIR__ . '/path/to/translations', 'stub-package');
//        $this->publishes([
//            __DIR__ . '/path/to/translations' => resource_path('lang/vendor/stub-package'),
//        ]);


        /*
        |--------------------------------------------------------------------------
        | Routes
        |--------------------------------------------------------------------------
        */
//        $this->loadRoutesFrom(__DIR__ . '/routes.php');


        /*
        |--------------------------------------------------------------------------
        | Views
        |--------------------------------------------------------------------------
        */
//        $this->loadViewsFrom(__DIR__ . '/path/to/views', 'stub-package');
//        $this->publishes([
//            __DIR__ . '/path/to/views' => resource_path('views/vendor/stub-package'),
//        ]);


        /*
        |--------------------------------------------------------------------------
        | Commands
        |--------------------------------------------------------------------------
        */
//        if ($this->app->runningInConsole()) {
//            $this->commands([
//                FooCommand::class,
//                BarCommand::class,
//            ]);
//        }


        /*
        |--------------------------------------------------------------------------
        | Public Assets
        |--------------------------------------------------------------------------
        | php artisan vendor:publish --tag=public --force
        */
//        $this->publishes([
//            __DIR__.'/path/to/assets' => public_path('vendor/stub-package'),
//        ], 'public');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'stub-package');
    }
}
