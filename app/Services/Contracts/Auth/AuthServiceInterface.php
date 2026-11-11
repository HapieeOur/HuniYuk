<?php

namespace App\Services\Contracts\Auth;

use App\Models\User;

interface AuthServiceInterface
{
    public function register(array $data): array;

    public function login(array $credentials): array;

    public function logout(User $user): bool;

    public function verifyEmail(string $id, string $hash): array;

    public function resendVerificationEmail(User $user): array;
}
