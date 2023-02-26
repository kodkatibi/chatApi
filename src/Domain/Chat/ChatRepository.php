<?php

declare(strict_types=1);

namespace App\Domain\Chat;

interface ChatRepository
{
    /**
     * @param int $roomId
     * @return array
     * @throws ChatNotFoundException
     */
    public function findAll(int $roomId): array;

    public function sendMessage(int $userId, int $roomId, string $message);

}