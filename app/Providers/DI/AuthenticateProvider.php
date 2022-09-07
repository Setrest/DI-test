<?php

namespace App\Providers\DI;

use App\Domain\Authenticate\Contracts\AuthenticateServiceInterface;
use App\Domain\Authenticate\Services\AuthenticateService;
use App\Domain\Records\Contracts\RecordServiceInterface;
use App\Domain\Records\Services\RecordService;
use Illuminate\Support\ServiceProvider;

class AuthenticateProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AuthenticateServiceInterface::class,
            AuthenticateService::class
        );
    }
}
