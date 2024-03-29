<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        //mengatur timezone  Indonesia
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // Menambahkan  Bootsrtap
        Paginator::useBootstrap();

    }
}
