<?php

namespace App\Services\Implementasi\Auth;

use App\Models\User;
use App\Repositories\Contracts\Auth\AuthRepositoryInterface;
use App\Services\Contracts\Auth\AuthServiceInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        protected AuthRepositoryInterface $authRepository
    ) {}

    public function register(array $data): array
    {
        $role = $data['role'];
        unset($data['role'], $data['password_confirmation']);

        $user = $this->authRepository->createUser($data);

        $user->assignRole($role);

        event(new Registered($user));

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'role' => $user->getRoleNames()->first(),
            'token' => $token,
        ];
    }

    public function login(array $credentials): array
    {
        $user = $this->authRepository->findByEmail($credentials['email']);

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Kredensial yang diberikan tidak cocok dengan data kami.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'role' => $user->getRoleNames()->first(),
            'token' => $token,
        ];
    }

    public function logout(User $user): bool
    {
        return (bool) $user->currentAccessToken()->delete();
    }

    public function verifyEmail(string $id, string $hash): array
    {
        $user = $this->authRepository->findById($id);

        if (! $user || ! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException('Link verifikasi tidak valid.');
        }

        if ($user->hasVerifiedEmail()) {
            return [
                'status'  => 200,
                'message' => 'Email sudah diverifikasi sebelumnya.',
            ];
        }

        $user->markEmailAsVerified();

        return [
            'status'  => 200,
            'message' => 'Selamat, email Anda berhasil diverifikasi.',
        ];
    }

    public function resendVerificationEmail(User $user): array
    {
        if ($user->hasVerifiedEmail()) {
            return [
                'status'  => 200,
                'message' => 'Email sudah terverifikasi sebelumnya.',
            ];
        }

        $user->sendEmailVerificationNotification();

        return [
            'status'  => 200,
            'message' => 'Link verifikasi baru telah dikirim ke email Anda.',
        ];
    }
}
