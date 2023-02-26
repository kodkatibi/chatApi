<?php

declare(strict_types=1);

namespace App\Domain\Room;

interface RoomRepository
{
    /**
     * @param int $userId
     * @return array
     * @throws RoomNotFoundException
     */
    public function findAll(int $userId): array;

    /**
     * @param int $yserId
     * @param int $id
     * @return array
     * @throws RoomNotFoundException
     */
    public function findRoomOfId(int $userId, int $id): array;

    /**
     * @param array $request
     * @return array
     */
    public function createRoom(array $request): array;
}