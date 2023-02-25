<?php

declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class User implements JsonSerializable
{
    private ?int $id;

    private string $userEmail;

    private string $firstName;

    private string $lastName;

    public function __construct(?int $id, string $userEmail, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->userEmail = strtolower($userEmail);
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'userEmail' => $this->userEmail,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}
