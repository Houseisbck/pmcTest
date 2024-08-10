<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class UserCreateData extends Data
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';
    public const BIRTHDAY = 'birthday';
    public const PHONE = 'phone';

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $birthday,
        public string $phone
    ) {
    }
}
