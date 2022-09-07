<?php

namespace App\Domain\Records\Queries;

use App\Domain\Records\Contracts\RecordsDatasetInterface;
use Illuminate\Support\Collection;

class GetDatabaseRecordsQuery
{
    public function __construct(private RecordsDatasetInterface $recordsDataset)
    {}

    public function call(): Collection
    {
        return $this->recordsDataset->get();
    }
}