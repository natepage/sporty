<?php

namespace App\Providers;

use Creitive\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Breadcrumbs::setDivider('<i class="fa fa-angle-right" aria-hidden="true"></i>');
        Breadcrumbs::addCrumb('<i class="fa fa-home" aria-hidden="true"></i>', url('/'));
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
