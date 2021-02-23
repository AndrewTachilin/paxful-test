<?php

namespace App\Providers;

use App\Contracts\Services\Calculations\MathOperationsServiceInterface;
use App\Contracts\Services\Funds\FundServiceInterface;
use App\Services\Calculations\MathOperationsService;
use App\Services\Funds\FundService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FundServiceInterface::class, FundService::class);
        $this->app->singleton(MathOperationsServiceInterface::class, MathOperationsService::class);
    }
}
