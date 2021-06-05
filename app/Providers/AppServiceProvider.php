<?php

namespace App\Providers;

use App\Jobs\Mailjob;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Queue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if ($this->app->environment('local', 'testing')) {
        //      $this->app->register(DuskServiceProvider::class);
        //      }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Schema:: defaultStringLenth(191);
        // Paginator::useBootstrap();
        // JsonResource::withoutWrapping();
    }
}
