<?php

namespace App\Http\Controllers;

use App\Enums\UserResponseMessages;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserGetRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function create(UserCreateRequest $request): Response
    {
        return response(new UserResource($this->userService->createUser($request->toDto())), 201);
    }

    /**
     * @throws UserNotFoundException
     */
    public function get(UserGetRequest $request): Response
    {
        return response(new UserResource($this->userService->getUser($request->toDto())), 200);
    }

    /**
     * @throws UserNotFoundException
     */
    public function update(UserUpdateRequest $request): Response
    {
        return response(new UserResource($this->userService->updateUser($request->toDto())), 200);
    }

    /**
     * @throws UserNotFoundException
     */
    public function delete(UserDeleteRequest $request): Response
    {
        $this->userService->deleteUser($request->toDto());

        return response(UserResponseMessages::SUCCESS_DELETE->value, 200);
    }
}
