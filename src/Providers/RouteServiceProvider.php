<?php

namespace :uc:vendor\:uc:package\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const ROUTES_FILE = __DIR__.'/../../routes/:lc:package.web.php';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->prefix(':lc:package')
                ->name(':lc:package.')
                ->group(self::ROUTES_FILE);
        });
    }
}
