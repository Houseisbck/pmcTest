<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class LoginUserData extends Data
{
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
