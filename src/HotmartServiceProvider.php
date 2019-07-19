<?php

namespace Wesleydeveloper\Hotmart;

use Illuminate\Support\ServiceProvider;

class HotmartServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'wesleydeveloper');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'wesleydeveloper');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/hotmart.php', 'hotmart');

        // Register the service the package provides.
        $this->app->singleton('hotmart', function ($app) {
            return new Hotmart;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hotmart'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/hotmart.php' => config_path('hotmart.php'),
        ], 'hotmart.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/wesleydeveloper'),
        ], 'hotmart.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/wesleydeveloper'),
        ], 'hotmart.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/wesleydeveloper'),
        ], 'hotmart.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
