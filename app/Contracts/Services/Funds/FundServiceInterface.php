<?php

declare(strict_types=1);

namespace App\Contracts\Services\Funds;

use App\Models\User;

interface FundServiceInterface
{
    public function send(int $amount, int $wallet, User $user): bool;
}
