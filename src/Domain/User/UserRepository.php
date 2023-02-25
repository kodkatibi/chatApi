<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return array
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): array;

    /**
     * @param array $request
     * @return array
     */
    public function createUser(array $request): array;
}
