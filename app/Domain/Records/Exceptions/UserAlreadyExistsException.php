<?php

namespace App\Domain\Records\Exceptions;

use Exception;

class UserAlreadyExistsException extends Exception
{
    public function render($request)
    {
        return response()->json(['message' => 'User with this name, second name and patronymic already exists!'], 400);
    }
}
