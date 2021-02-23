<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\Authenticate;

class AuthenticateJwt extends Authenticate
{
    public function handle($request, Closure $next)
    {
        try {
            $this->auth->setRequest($request)->parseToken()->authenticate();
        } catch (\Exception $e) {
            throw new JWTException($e->getMessage(), JsonResponse::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
