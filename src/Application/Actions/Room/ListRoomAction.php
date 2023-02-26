<?php

declare(strict_types=1);

namespace App\Application\Actions\Room;

use Psr\Http\Message\ResponseInterface as Response;

class ListRoomAction extends RoomAction
{
    protected function action(): Response
    {
        $userId = (int)$this->resolveArg('userId');
        $rooms = $this->roomRepository->findAll($userId);
        $this->logger->info("Room list was viewed.");

        return $this->respondWithData($rooms);
    }
}
