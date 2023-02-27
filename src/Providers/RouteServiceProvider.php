<?php

namespace :uc:vendor\:uc:package\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const ROUTES_FILE = __DIR__.'/../../routes/:lc:package.api.v1.php';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/v1/:lc:package')
                ->name(':lc:package.')
                ->group(self::ROUTES_FILE);
        });
    }
}
