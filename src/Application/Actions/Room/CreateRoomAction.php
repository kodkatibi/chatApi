<?php

namespace App\Application\Actions\Room;

use Psr\Http\Message\ResponseInterface as Response;

class CreateRoomAction extends RoomAction
{

    protected function action(): Response
    {
        $userId = (int)$this->resolveArg('userId');
        $request = $this->request->getParsedBody();
        $room = $this->roomRepository->createRoom($request + ['userId' => $userId]);
        $roomId = $room['id'];
        $this->logger->info("User of id `$roomId` was created.");
        return $this->respondWithData($room);
    }
}