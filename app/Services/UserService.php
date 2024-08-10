<?php

namespace App\Services;

use App\DataTransferObjects\IdData;
use App\DataTransferObjects\UserCreateData;
use App\DataTransferObjects\UserUpdateData;
use App\Exceptions\UserNotFoundException;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function createUser(UserCreateData $userCreateData): User
    {
        return $this->userRepository->createUser(new User($userCreateData->toArray()));
    }

    /**
     * @throws UserNotFoundException
     */
    public function getUser(idData $idData): User
    {
        return $this->userRepository->getUser($idData);
    }

    /**
     * @throws UserNotFoundException
     */
    public function updateUser(UserUpdateData $userUpdateData): User
    {
        return $this->userRepository->updateUser($userUpdateData);
    }

    /**
     * @throws UserNotFoundException
     */
    public function deleteUser(IdData $idData): void
    {
        $this->userRepository->deleteUser($idData);
    }
}
