<?php

namespace App\Domain\User;

use App\Domain\Chat\Chat;
use App\Domain\Room\Room;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function chats(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chat::class, 'from_user_id');
    }

    public function rooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class, 'created_by');
    }

}
