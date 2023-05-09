<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('city', \App\Repositories\CityRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->composer(['Admin.consignment.createOrEdit', 'Admin.user.createOrEdit', 'Admin.motorcycle.createOrEdit'], function ($view) {
            $view->with('cities', City::active()->get());
        });
    }
}
