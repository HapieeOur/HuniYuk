<?php

namespace App\Providers;

use App\Repositories\Contracts\Auth\AuthRepositoryInterface;
use App\Repositories\Implementasi\Auth\AuthRepository;
use App\Services\Contracts\Auth\AuthServiceInterface;
use App\Services\Implementasi\Auth\AuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function boot(): void
    {
        //
    }
}
