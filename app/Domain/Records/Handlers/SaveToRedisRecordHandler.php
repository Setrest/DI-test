<?php

namespace App\Domain\Records\Handlers;

use App\Domain\Records\Contracts\RecordsRepositoryInterface;
use App\Domain\Records\Entities\RecordEntity;

class SaveToRedisRecordHandler
{

    public function __construct(private RecordsRepositoryInterface $recordsRepository)
    {}

    public function call(string $name, string $secondName, string $patronymic, string $email, string $phone): RecordEntity
    {
        $entity = new RecordEntity(
            name:$name,
            secondName:$secondName,
            patronymic:$patronymic,
            email:$email,
            phone:$phone
        );

        $this->recordsRepository->save($entity);

        return $entity;
    }
}
