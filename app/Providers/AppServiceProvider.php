<?php

namespace App\Providers;

use App\Repositories\Car\CarEloquent;
use App\Repositories\Car\CarRepository;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CarRepository::class, CarEloquent::class);
    }
}
