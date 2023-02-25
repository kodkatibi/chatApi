<?php

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class CreateUserAction extends UserAction
{

    protected function action(): Response
    {
        $request = $this->request->getParsedBody();
        $user = $this->userRepository->createUser($request);
        $userId = $user['id'];
        $this->logger->info("User of id `$userId` was created.");
        return $this->respondWithData($user);
    }
}