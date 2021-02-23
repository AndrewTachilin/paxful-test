<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class UserWallet extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'user_wallets';

    public function getWalletByNumber(int $walletNumber): UserWallet
    {
        return UserWallet::query()->where('wallet', $walletNumber)->firstOrFail();
    }

    public function getWalletById(int $userId): UserWallet
    {
        return UserWallet::query()->where('id', $userId)->firstOrFail();
    }
}
