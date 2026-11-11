<?php

namespace App\Repositories\Contracts\Auth;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function createUser(array $data): User;

    public function findByEmail(string $email): ?User;

    public function findById(string $id): ?User;
}
