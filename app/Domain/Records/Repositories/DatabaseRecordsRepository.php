<?php

namespace App\Domain\Records\Repositories;

use App\Domain\Records\Contracts\RecordsRepositoryInterface;
use App\Domain\Records\Entities\RecordEntity;
use App\Domain\Records\Exceptions\UserAlreadyExistsException;
use App\Models\Record;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class DatabaseRecordsRepository implements RecordsRepositoryInterface
{
    public function save(RecordEntity $recordEntity)
    {
        $data = array_filter($recordEntity->toArray());
        $data = collect($data)->transformKeys(fn($key) => Str::snake($key));

        try {
            Record::create($data->toArray());
        } catch (QueryException $e) {
            throw new UserAlreadyExistsException();
        }
    }
}