<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Contracts\Services\AuthServiceInterface;
use App\Exceptions\Auth\AuthException;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class AuthService implements AuthServiceInterface
{
    public function login(string $email, string $password): string
    {
        $user = User::query()->where(['email' => $email, 'active' => 1])->get();
        if (!$user) {
            throw new AuthException('Invalid login or password.');
        }
        $token = auth()->attempt(['email' => $email, 'password' => $password, 'active' => 1]);
        if (!$token) {
            throw new AuthException('Invalid login or password.');
        }

        return $token;
    }
}
