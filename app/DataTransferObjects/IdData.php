<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class IdData extends Data
{
    public function __construct(
        public int $id,
    ) {
    }
}
