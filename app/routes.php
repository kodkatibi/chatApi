<?php

declare(strict_types=1);

use App\Application\Actions\Room\CreateRoomAction;
use App\Application\Actions\Room\ListRoomAction;
use App\Application\Actions\Room\ViewRoomAction;
use App\Application\Actions\User\CreateUserAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->post('/create', CreateUserAction::class);
    });
    $app->group('/rooms/{userId}', function (Group $group) {
        $group->get('', ListRoomAction::class);
        $group->get('/{id}', ViewRoomAction::class);
        $group->post('/create', CreateRoomAction::class);
    });
    $app->group('/chats/{roomId}', function (Group $group) {
        $group->get('', ListRoomAction::class);
        $group->post('/send-message', CreateRoomAction::class);
    });
};
