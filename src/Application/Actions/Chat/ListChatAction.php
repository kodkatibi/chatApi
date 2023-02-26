<?php

namespace App\Application\Actions\Chat;

use Psr\Http\Message\ResponseInterface as Response;

class ListChatAction extends ChatAction
{

    protected function action(): Response
    {
        $roomId = (int)$this->resolveArg('roomId');
        $messages = $this->chatRepository->findAll($roomId);
        return $this->respondWithData($messages);
    }
}