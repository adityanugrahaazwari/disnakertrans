<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Implicitly grant "Super Admin" role all permissions
        // This works in the gate-checked functions like auth()->user()->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        // Share common data with public views
        view()->composer(['welcome', 'layouts.public'], function ($view) {
            $view->with('footerProfile', \App\Models\Profile::first() ?? new \App\Models\Profile());
            $view->with('navCategories', \App\Models\Category::all());
            $view->with('navServices', \App\Models\Service::where('is_active', true)->orderBy('order')->get());
        });
    }
}
