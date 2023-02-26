<?php

namespace App\Domain\Room;

use App\Domain\DomainException\DomainRecordNotFoundException;

class RoomNotFoundException extends DomainRecordNotFoundException
{
    public $message = "Room not found";
}