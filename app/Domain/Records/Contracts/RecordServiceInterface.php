<?php

namespace App\Domain\Records\Contracts;

use App\Domain\Records\Entities\RecordEntity;
use App\Domain\Records\Enums\SaveTo;
use App\Models\Record;
use Illuminate\Support\Collection;

interface RecordServiceInterface
{
    // public function save(string $name, string $secondName, string $patronymic, string $email, string $phone, SaveTo $saveTo): RecordEntity;
    // public function get(): Collection;
}
