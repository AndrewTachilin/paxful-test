<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class CurrencyTransfer extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'currency_transfers';

    protected $fillable = ['from_user_wallet','to_user_wallet','amount'];

    public function saveTransfer(int $amount, UserWallet $ownerCardNumber, UserWallet $recipientWallet): CurrencyTransfer
    {
        $model = new CurrencyTransfer(
            [
                'from_user_wallet' => $ownerCardNumber->wallet,
                'to_user_wallet' => $recipientWallet->wallet,
                'amount' => $amount
            ]
        );
        $model->save();



        return $model;
    }
}
