<?php

declare(strict_types=1);

use App\Domain\Room\RoomRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Room\InMemoryRoomRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        RoomRepository::class => \DI\autowire(InMemoryRoomRepository::class),
    ]);
};
