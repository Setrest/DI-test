<?php

namespace App\Providers\DI;

use App\Domain\Records\Contracts\RecordsDatasetInterface;
use App\Domain\Records\Contracts\RecordsRepositoryInterface;
use App\Domain\Records\Contracts\RecordServiceInterface;
use App\Domain\Records\Datasets\DatabaseRecordsDataset;
use App\Domain\Records\Datasets\RedisRecordsDataset;
use App\Domain\Records\Handlers\SaveRecordHandler;
use App\Domain\Records\Handlers\SaveToDatabaseRecordHandler;
use App\Domain\Records\Handlers\SaveToRedisRecordHandler;
use App\Domain\Records\Queries\GetDatabaseRecordsQuery;
use App\Domain\Records\Queries\GetRecordsQuery;
use App\Domain\Records\Queries\GetRedisRecordsQuery;
use App\Domain\Records\Repositories\DatabaseRecordsRepository;
use App\Domain\Records\Repositories\RedisRecordsRepository;
use App\Domain\Records\Services\RecordService;
use App\Http\Context\Records\Controllers\DatabaseRecordController;
use App\Http\Context\Records\Controllers\RedisRecordController;
use Illuminate\Support\ServiceProvider;

class RecordsProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            RecordServiceInterface::class,
            RecordService::class
        );

        $this->app->when(SaveToDatabaseRecordHandler::class)
            ->needs(RecordsRepositoryInterface::class)
            ->give(DatabaseRecordsRepository::class);

        $this->app->when(SaveToRedisRecordHandler::class)
            ->needs(RecordsRepositoryInterface::class)
            ->give(RedisRecordsRepository::class);

        $this->app->when(GetDatabaseRecordsQuery::class)
            ->needs(RecordsDatasetInterface::class)
            ->give(DatabaseRecordsDataset::class);

        $this->app->when(GetRedisRecordsQuery::class)
            ->needs(RecordsDatasetInterface::class)
            ->give(RedisRecordsDataset::class);
    }
}
