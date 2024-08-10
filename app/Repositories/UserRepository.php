<?php

namespace App\Repositories;

use App\DataTransferObjects\IdData;
use App\DataTransferObjects\UserUpdateData;
use App\Exceptions\UserNotFoundException;
use App\Models\User;

class UserRepository
{
    public function createUser(User $user): User
    {
        $user->save();

        return $user->refresh();
    }

    /**
     * @throws UserNotFoundException
     */
    public function updateUser(UserUpdateData $userUpdateData): User
    {
        $user = User::find($userUpdateData->id);
        if (empty($user)) {
            throw new UserNotFoundException();
        }
        $user->name = $userUpdateData->name;
        $user->email = $userUpdateData->email;
        $user->birthday = $userUpdateData->birthday;
        $user->phone = $userUpdateData->phone;
        $user->save();

        return $user->refresh();
    }

    /**
     * @throws UserNotFoundException
     */
    public function getUser(IdData $idData): User
    {
        $user = User::find($idData->id);
        if (empty($user)) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    /**
     * @throws UserNotFoundException
     */
    public function deleteUser(IdData $idData): void
    {
        if (empty(User::destroy($idData->id))) {
            throw new UserNotFoundException();
        };
    }
}
