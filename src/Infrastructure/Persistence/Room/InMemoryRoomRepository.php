<?php

namespace App\Infrastructure\Persistence\Room;

use App\Domain\Room\Room;
use App\Domain\Room\RoomNotFoundException;
use App\Domain\Room\RoomRepository;

class InMemoryRoomRepository implements RoomRepository
{
    private Room $room;

    public function __construct()
    {
        $this->room = new Room();
    }

    public function findAll(int $userId): array
    {
        return $this->room->where('created_by', $userId)->get()->toArray();
    }

    public function findRoomOfId(int $userId, int $id): array
    {
        $user = $this->room->where('id', $id)->where('created_by', $userId)->with('chats')->get();
        if (!isset($user)) {
            throw new RoomNotFoundException();
        }
        return $user->toArray();
    }

    public function createRoom(array $request): array
    {
        return $this->room->create($request)->toArray();
    }

}
