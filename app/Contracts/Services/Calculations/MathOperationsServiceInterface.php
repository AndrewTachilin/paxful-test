<?php

declare(strict_types=1);

namespace App\Contracts\Services\Calculations;

interface MathOperationsServiceInterface
{
    public function convertAmountToKopecks(float $amount): int;

    public function withdrawCommission(int $amount): int;

    public function getAmountWithCommission(int $amount): int;
}
