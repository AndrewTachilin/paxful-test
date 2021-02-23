<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;

class TransactionFundException extends BaseException
{
    public function __construct(string $message = '', int $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
    {
        parent::__construct($message, $code);
    }
}
