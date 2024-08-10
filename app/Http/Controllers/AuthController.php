<?php

namespace App\Http\Controllers;

use App\Enums\AuthResponseMessages;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function register(AuthRegisterRequest $request): Response
    {
        return response(new UserResource($this->authService->registerUser($request->toDto())), 201);
    }

    /**
     * @throws AuthenticationException
     */
    public function login(AuthLoginRequest $request): Response
    {
        return response($this->authService->getTokenDataFromCredentials($request->toDto()), 200);
    }

    public function logout(): Response
    {
        $this->authService->logout();

        return response(AuthResponseMessages::SUCCESSFULLY_LOGGING_OUT->value, 200);
    }

    public function refresh(): Response
    {
        return response($this->authService->getTokenDataFromRefresh(), 200);
    }
}
