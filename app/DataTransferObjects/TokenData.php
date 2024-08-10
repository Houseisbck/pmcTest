<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public function __construct(
        public string $token,
        public string $tokenType = 'bearer',
        public int $expiresIn = 3600,
    ) {
    }
}
