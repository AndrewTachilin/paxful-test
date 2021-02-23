<?php

declare(strict_types=1);

namespace App\Http\Controllers\Fund;

use App\Contracts\Services\Funds\FundServiceInterface;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Fund\SendFundRequest;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller;

class FundTransferController extends Controller
{
    private FundServiceInterface $fundService;

    public function __construct(FundServiceInterface $fundService)
    {
        $this->fundService = $fundService;
    }

    public function send(SendFundRequest $request): JsonResponse
    {
        return new JsonResponse(['transfer' =>
            $this->fundService->send(
                (int) $request->post('amount'),
                (int) $request->post('recipient_wallet'),
                $request->user()
            )
          ]
        );
    }
}
