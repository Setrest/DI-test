<?php

namespace App\Infrastructure\Domain;

use Illuminate\Database\Eloquent\Model;

abstract class DTO
{
    abstract static public function fromJson(string $json): self;

    abstract static public function fromModel(Model $model): self;
}