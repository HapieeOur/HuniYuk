<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\KostRepositoryInterface;
use App\Repositories\Implementasi\KostRepository;

use App\Services\Contracts\KostServicesInterface;
use App\Services\Implementasi\KostServices;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(
            KostRepositoryInterface::class,
            KostRepository::class,

        );
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
