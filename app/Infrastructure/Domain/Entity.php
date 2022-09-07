<?php

namespace App\Infrastructure\Domain;

abstract class Entity
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}