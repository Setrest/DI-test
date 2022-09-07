<?php

namespace App\Domain\Records\Services;

use App\Domain\Records\Contracts\RecordServiceInterface;
use App\Domain\Records\Contracts\RecordsRepositoryInterface;
use App\Domain\Records\Entities\RecordEntity;
use App\Domain\Records\Enums\SaveTo;
use Illuminate\Support\Collection;

class RecordService implements RecordServiceInterface
{
    public function __construct(private RecordsRepositoryInterface $recordsRepository)
    {}

    public function save(string $name, string $secondName, string $patronymic, string $email, string $phone, SaveTo $saveTo)
    {
    }

    public function get(): Collection
    {
        return collect([]);
    }
}
