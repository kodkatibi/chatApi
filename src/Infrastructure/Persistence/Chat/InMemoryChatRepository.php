<?php

namespace App\Infrastructure\Persistence\Chat;

use App\Domain\Chat\Chat;
use App\Domain\Chat\ChatNotFoundException;
use App\Domain\Chat\ChatRepository;

class InMemoryChatRepository implements ChatRepository
{

    private Chat $chat;

    public function __construct()
    {
        $this->chat = new Chat();
    }

    public function findAll(int $roomId): array
    {
        $chats = $this->chat->where('room_id', '=', $roomId)->with('user')->get();
        if (!isset($chats)) {
            throw new ChatNotFoundException();
        }
        return $chats->toArray();
    }

    public function sendMessage(int $userId, int $roomId, string $message)
    {
        $data = [
            'user_id' => $userId,
            'room_id' => $roomId,
            'message' => $message
        ];
        $this->chat->create($data);
        return $this->findAll($roomId);
    }
}