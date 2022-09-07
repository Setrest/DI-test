<?php

namespace App\Domain\Authenticate\Handlers;

use App\Domain\Authenticate\Contracts\AuthenticateServiceInterface;

class EmailAuthenticateHandler
{
    public function __construct(private AuthenticateServiceInterface $authService){}

    public function call(string $email, string $password)
    {
        return $this->authService->authByCredentials($email, $password);
    }
}