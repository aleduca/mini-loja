<?php

namespace app\dto;

class AuthDto
{
    public string $fullName;

    public function __construct(
        public readonly int $id,
        public readonly string $firstName,
        public readonly string $lastName,
        public ?string $email = null
    ) {
        $this->fullName = $this->firstName . ' ' . $this->lastName;
    }
}
