<?php

namespace App\Providers;

use App\Repositories\Contracts\Auth\AuthRepositoryInterface;
use App\Repositories\Implementasi\Auth\AuthRepository;
use App\Services\Contracts\Auth\AuthServiceInterface;
use App\Services\Implementasi\Auth\AuthService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\KostRepositoryInterface;
use App\Repositories\Implementasi\KostRepository;

use App\Services\Contracts\KostServicesInterface;
use App\Services\Implementasi\KostServices;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->bind(
            KostRepositoryInterface::class,
            KostRepository::class,

        );
        //
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function boot(): void
    {
        //
    }
}
