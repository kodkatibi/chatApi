<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use App\Domain\User\User;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User
     */
    private User $User;

    /**
     * @param User|null $User
     */
    public function __construct()
    {
        $this->User = new User();
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->User->all()->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): array
    {
        $user = $this->User->find($id);
        if (!isset($user)) {
            throw new UserNotFoundException();
        }
        return $user->toArray();
    }

    /**
     * @param array $request
     * @return array
     */
    public function createUser(array $request): array
    {
        $user = $this->User->create($request);
        return $user->toArray();
    }
}
