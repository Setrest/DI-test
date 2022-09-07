<?php

namespace App\Domain\Records\Contracts;

use App\Domain\Records\Entities\RecordEntity;

interface RecordsRepositoryInterface
{
    public function save(RecordEntity $recordEntity);
}