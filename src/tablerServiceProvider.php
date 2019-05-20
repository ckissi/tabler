<?php

namespace ckissi\tabler;

use Collective\Html\HtmlServiceProvider;
use Illuminate\Support\ServiceProvider;
use Lavary\Menu\ServiceProvider as Menu;
use ckissi\tabler\Commands\TablerCommand;
//use ckissi\tabler\ComposerServiceProvider;

class tablerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ckissi');
        //$this->loadViewsFrom(__DIR__.'/../resources/views', 'ckissi');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tabler');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'tabler');

        $this->publishes([
            __DIR__ . '/../config/tabler.php' => config_path('tabler.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tabler'),
        ], 'views');
        $this->publishes([
            base_path('vendor/tabler/tabler/dist/assets') => public_path('admin/assets')
        ], 'assets');
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/tabler')
        ], 'translations');

        $this->commands(TablerCommand::class);

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
        $this->mergeConfigFrom(__DIR__.'/../config/tabler.php', 'tabler');

        $this->app->register(Menu::class);
        $this->app->register(ComposerServiceProvider::class);
        $this->app->register(HtmlServiceProvider::class);

        // Register the service the package provides.
        $this->app->singleton('tabler', function ($app) {
            return new tabler;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['tabler'];
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
            __DIR__.'/../config/tabler.php' => config_path('tabler.php'),
        ], 'tabler.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ckissi'),
        ], 'tabler.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ckissi'),
        ], 'tabler.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ckissi'),
        ], 'tabler.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
