<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use App\Models\User as UserModel;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var UserModel
     */
    private UserModel $userModel;

    /**
     * @param UserModel|null $userModel
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->userModel->all()->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): array
    {
        $user = $this->userModel->find($id);
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
        $user = $this->userModel->create($request);
        return $user->toArray();
    }
}
