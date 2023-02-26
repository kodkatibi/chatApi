<?php

namespace App\Application\Actions\Room;

use Psr\Http\Message\ResponseInterface as Response;

class ViewRoomAction extends RoomAction
{

    protected function action(): Response
    {
        $userId = (int)$this->resolveArg('userId');
        $roomId = (int)$this->resolveArg('id');
        $room = $this->roomRepository->findRoomOfId($userId, $roomId);
        return $this->respondWithData($room);
    }
}