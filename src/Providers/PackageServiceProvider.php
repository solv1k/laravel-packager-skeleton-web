<?php

namespace :uc:vendor\:uc:package\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public const CONFIG_PATH = __DIR__.'/../../config/:lc:package.php';
    public const MIGRATIONS_PATH = __DIR__.'/../../database/migrations';
    public const LANGS_PATH = __DIR__.'/../../resources/lang';
    public const VIEWS_PATH = __DIR__.'/../../resources/views';
    public const ASSETS_PATH = __DIR__.'/../../resources/assets';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (file_exists(self::MIGRATIONS_PATH)) {
            $this->loadMigrationsFrom(self::MIGRATIONS_PATH);
        }

        if (file_exists(self::LANGS_PATH)) {
            $this->loadTranslationsFrom(self::LANGS_PATH, ':lc:vendor.:lc:package');
        }

        if (file_exists(self::VIEWS_PATH)) {
            $this->loadViewsFrom(self::VIEWS_PATH, ':lc:vendor.:lc:package');
        }

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
    public function register(): void
    {
        // Register config
        $this->mergeConfigFrom(self::CONFIG_PATH, ':lc:vendor.:lc:package');

        // Register providers
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [':lc:vendor.:lc:package'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            self::CONFIG_PATH => config_path(':lc:vendor.:lc:package.php'),
        ], [':lc:vendor.:lc:package', ':lc:vendor.:lc:package.config']);

        // Publishing the views.
        /*$this->publishes([
            self::VIEWS_PATH => base_path('resources/views/vendor/:lc:vendor/:lc:package'),
        ], [':lc:vendor.:lc:package', ':lc:vendor.:lc:package.views']);*/

        // Publishing the translation files.
        /*$this->publishes([
            self::LANGS_PATH => resource_path('lang/vendor/:lc:vendor/:lc:package'),
        ], [':lc:vendor.:lc:package', ':lc:vendor.:lc:package.lang']);*/

        // Publishing assets.
        /*$this->publishes([
            self::ASSETS_PATH => public_path('vendor/:lc:vendor/:lc:package'),
        ], [':lc:vendor.:lc:package', ':lc:vendor.:lc:package.assets']);*/

        // Registering package commands.
        // $this->commands([]);
    }
}
