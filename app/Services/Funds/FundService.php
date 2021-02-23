<?php

declare(strict_types=1);

namespace App\Services\Funds;

use App\Contracts\Services\Funds\FundServiceInterface;
use App\Contracts\Services\Calculations\MathOperationsServiceInterface;
use App\Exceptions\Auth\TransactionFundException;
use App\Models\Commission;
use App\Models\CurrencyTransfer;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Support\Facades\DB;

class FundService implements FundServiceInterface
{
    private MathOperationsServiceInterface $mathOperationService;

    private CurrencyTransfer $currencyTransfer;

    private UserWallet $userWallet;

    private Commission $commission;

    public function __construct(
        MathOperationsServiceInterface $mathOperationService,
        CurrencyTransfer $currencyTransfer,
        UserWallet $userWallet,
        Commission $commission
    )
    {
        $this->mathOperationService = $mathOperationService;
        $this->currencyTransfer = $currencyTransfer;
        $this->userWallet = $userWallet;
        $this->commission = $commission;
    }

    public function send(int $amount, int $walletNumber, User $user): bool
    {
        $amount = $this->mathOperationService->convertAmountToKopecks($amount);

        $amountWithCommission = $this->mathOperationService->getAmountWithCommission($amount);

        $commission = $this->mathOperationService->withdrawCommission($amount);

        try{
            DB::beginTransaction();
            $recipient = $this->userWallet->getWalletByNumber($walletNumber);
            $ownerCardNumber = $this->userWallet->getWalletById($user->id);
            $currencyTransfer = $this->currencyTransfer->saveTransfer(
                $amountWithCommission,
                $ownerCardNumber,
                $recipient
            );

            $this->commission->saveTransferCommission($commission, $currencyTransfer);
            DB::commit();
        }catch (\Throwable $e){
            throw new TransactionFundException($e->getMessage());
        }

        return true;
    }
}
