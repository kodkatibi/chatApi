<?php

namespace App\Models;

use App\Domain\User\UserRepository;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements UserRepository
{

    public function findAll(): array
    {
        return self::all()->toArray();
    }

    public function findUserOfId(int $id): \App\Domain\User\User
    {
        return self::where('id', $id)->first();
    }
}