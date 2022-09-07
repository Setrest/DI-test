<?php

namespace App\Domain\Records\Datasets;

use App\Domain\Records\Contracts\RecordsDatasetInterface;
use App\Domain\Records\DTOs\RecordDTO;
use Illuminate\Support\Collection;
use Illuminate\Redis\Connections\Connection;
use Illuminate\Support\Facades\Redis;

class RedisRecordsDataset implements RecordsDatasetInterface
{
    private Connection $redisConnection;

    public function __construct()
    {
        $this->redisConnection = Redis::connection();
    }

    public function get(): Collection
    {
        $collection = collect($this->redisConnection->lrange('userRecords', 0, -1))->map(function($item) {
            return RecordDTO::fromJson($item);
        });
        
        return $collection;
    }
}