<?php

namespace App\Providers;

use App\Repositories\DbReportRepository;
use App\Repositories\DbWebsiteRepository;
use App\Services\Reports\GetAllReports;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        view()->composer(['home', 'layouts.app'], function (View $view) {
            $reports = (new DbReportRepository)->getAllAvailableReports();
            $websites = (new DbWebsiteRepository)->getAllAvailableWebsites();

            $view
                ->with('reports', $reports)
                ->with('websites', $websites);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
