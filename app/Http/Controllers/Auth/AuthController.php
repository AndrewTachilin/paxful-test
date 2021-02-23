<?php


namespace App\Http\Controllers\Auth;


use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        return new JsonResponse(['token' => $authService->login($request->get('login'), $request->get('password'))]);
    }
}
