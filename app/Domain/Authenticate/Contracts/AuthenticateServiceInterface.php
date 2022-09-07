<?php

namespace App\Domain\Authenticate\Contracts;

use App\Models\User;

interface AuthenticateServiceInterface
{
    public function authByCredentials(string $email, string $password): string;

    public function auth(User $user, string $tokenName = ''): string;
}