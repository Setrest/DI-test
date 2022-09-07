<?php

namespace App\Domain\Records\Datasets;

use App\Domain\Records\Contracts\RecordsDatasetInterface;
use App\Domain\Records\DTOs\RecordDTO;
use App\Models\Record;
use Illuminate\Support\Collection;

class DatabaseRecordsDataset implements RecordsDatasetInterface
{
    public function get(): Collection
    {
        $collection = Record::all()->map(function($item) {
            return RecordDTO::fromModel($item);
        });
        
        return $collection;
    }
}