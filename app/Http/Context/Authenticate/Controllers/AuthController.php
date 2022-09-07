<?php

namespace App\Http\Context\Authenticate\Controllers;

use App\Domain\Authenticate\Handlers\EmailAuthenticateHandler;
use App\Http\Context\Authenticate\Requests\AuthByEmailRequest;
use Illuminate\Container\Container;

class AuthController extends Container
{
    public function authByEmail(AuthByEmailRequest $request, EmailAuthenticateHandler $handler)
    {
        $payload = $request->validated();
        $accessToken = $handler->call(...$payload);

        return response()->json(['access_token' => $accessToken]);
    }
}
