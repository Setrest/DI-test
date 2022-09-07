<?php

namespace App\Domain\Records\Repositories;

use App\Domain\Records\Contracts\RecordsRepositoryInterface;
use App\Domain\Records\Entities\RecordEntity;
use App\Domain\Records\Exceptions\UserAlreadyExistsException;
use Exception;
use Illuminate\Redis\Connections\Connection;
use Illuminate\Support\Facades\Redis;

class RedisRecordsRepository implements RecordsRepositoryInterface
{
    private Connection $redisConnection;

    public function __construct()
    {
        $this->redisConnection = Redis::connection();
    }

    public function save(RecordEntity $recordEntity)
    {
        if (!$this->FioIsCorrect($recordEntity)) {
            throw new UserAlreadyExistsException();
        }

        $this->redisConnection->rpush("userRecords", $recordEntity->toJson());
    }

    private function FioIsCorrect(RecordEntity $recordEntity): bool
    {
        $allRecords = $this->redisConnection->lrange("userRecords", 0, -1);
        $allRecords = array_map(fn($item) => json_decode($item, true), $allRecords);
        $preparedRecords = [];

        foreach($allRecords as $key => $value) {
            $preparedRecords["{$value['name']} {$value['secondName']} {$value['patronymic']}"] = $value;
        }

        return !array_key_exists("{$recordEntity->name} {$recordEntity->secondName} {$recordEntity->patronymic}", $preparedRecords);
    }
}