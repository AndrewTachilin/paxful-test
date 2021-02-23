<?php

declare(strict_types=1);

namespace App\Contracts\Services;

interface AuthServiceInterface
{
    public function login(string $login, string $password): string;
}
