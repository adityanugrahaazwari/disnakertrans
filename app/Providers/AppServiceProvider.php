<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();

        // Implicitly grant "Super Admin" role all permissions
        // This works in the gate-checked functions like auth()->user()->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        // Share common data with all views
        view()->composer('*', function ($view) {
            $viewData = $view->getData();
            if (!array_key_exists('footerProfile', $viewData)) {
                $view->with('footerProfile', \App\Models\Profile::first() ?? new \App\Models\Profile());
            }
            if (!array_key_exists('navCategories', $viewData)) {
                $view->with('navCategories', \App\Models\Category::all());
            }
            if (!array_key_exists('navServices', $viewData)) {
                $view->with('navServices', \App\Models\Service::where('is_active', true)->orderBy('order')->get());
            }
            if (!array_key_exists('departments', $viewData)) {
                $view->with('departments', \App\Models\Department::where('is_active', true)->orderBy('order')->get());
            }
            if (!array_key_exists('hero', $viewData)) {
                $view->with('hero', \App\Models\Hero::where('is_active', true)->first());
            }
        });
    }
}
