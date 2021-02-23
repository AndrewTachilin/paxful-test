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

class Commission extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'commissions';

    protected $fillable = ['commission_fee', 'currency_transfer_id'];

    public function saveTransferCommission(int $commissionFee, CurrencyTransfer $currencyTransfer): bool
    {
        return (new Commission(
                [
                    'currency_transfer_id' => $currencyTransfer->id,
                    'commission_fee' => $commissionFee
                ]
            ))->save();
    }
}
