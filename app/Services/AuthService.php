<?php

namespace App\Services;

use App\DataTransferObjects\LoginUserData;
use App\DataTransferObjects\RegisterUserData;
use App\DataTransferObjects\TokenData;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\AuthenticationException;

class AuthService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function registerUser(RegisterUserData $registerUserData): User
    {
        return $this->userRepository->createUser(new User($registerUserData->toArray()));
    }

    /**
     * @throws AuthenticationException
     */
    public function getTokenDataFromCredentials(LoginUserData $loginUserData): TokenData
    {
        if (!$token = auth()->attempt($loginUserData->toArray())) {
            throw new AuthenticationException();
        }

        return new TokenData($token);
    }

    public function getTokenDataFromRefresh(): TokenData
    {
        return new TokenData(auth()->refresh());
    }

    public function logout(): void
    {
        auth()->logout();
    }
}
