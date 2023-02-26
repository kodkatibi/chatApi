<?php

namespace App\Application\Actions\Chat;

use Psr\Http\Message\ResponseInterface as Response;

class SendMessageAction extends ChatAction
{

    protected function action(): Response
    {
        $roomId = (int)$this->resolveArg('roomId');
        $userId = (int)$this->resolveArg('userId');
        $request = $this->request->getParsedBody();
        $chat = $this->chatRepository->sendMessage($userId, $roomId, $request['message']);
        return $this->respondWithData($chat);
    }
}