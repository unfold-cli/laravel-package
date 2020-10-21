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
        $this->publishesConfig();
        $this->registerRoutes();
        $this->registerViews();
//        $this->registerMigrations();
//        $this->registerTranslations();
//        $this->registerDirectives();
    }


    /**
     * Publishes config
     */
    public function publishesConfig()
    {
        $this->publishes([
            __DIR__.'/../config/stub-package.php' => config_path('stub-package.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'stub-package');
    }


    /**
     * Register Routes
     */
    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
    }

    /**
     * Register Views
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'stub-package');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/stub-package'),
        ]);
    }


    /**
     * Register Migrations
     */
    public function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }


    /**
     * Register commands.
     */
    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FooCommand::class,
                BarCommand::class,
            ]);
        }
    }


    /**
     * Register Translations
     */
    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'stub-package');
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/stub-package'),
        ]);
    }


    /**
     * Register Directives
     */
    public function registerDirectives()
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });

        Blade::if('env', function ($environment) {
            return app()->environment($environment);
        });
    }

}
