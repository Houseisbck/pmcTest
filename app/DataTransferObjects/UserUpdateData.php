<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class UserUpdateData extends Data
{
    public const ID = 'id';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const BIRTHDAY = 'birthday';
    public const PHONE = 'phone';

    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $birthday,
        public string $phone
    ) {
    }
}

