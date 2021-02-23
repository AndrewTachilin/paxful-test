<?php

declare(strict_types=1);

namespace App\Services\Calculations;


use App\Contracts\Services\Calculations\MathOperationsServiceInterface;

class MathOperationsService implements MathOperationsServiceInterface
{
    private CONST PERCENT = '100';

    private CONST COMMISSION = '0.015';

    public function convertAmountToKopecks(float $amount): int
    {
        $amount = bcmul((string) $amount, self::PERCENT);
        return (int) ceil($amount);
    }

    public function withdrawCommission(int $amount): int
    {
        return (int) bcmul((string) $amount, (string) self::COMMISSION);
    }

    public function getAmountWithCommission(int $amount): int
    {
        $commission = $this->withdrawCommission($amount);

        return (int) bcsub((string) $amount, (string) $commission);
    }
}
