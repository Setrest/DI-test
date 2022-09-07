<?php

namespace App\Domain\Records\Entities;

use App\Infrastructure\Domain\Entity;

class RecordEntity extends Entity
{
    public ?int $id = null;

    public function __construct(public string $name, public string $secondName, public string $patronymic, public string $email, public string $phone)
    {}

    public function setId(int $id)
    {
        $this->id = $id;
    }
}