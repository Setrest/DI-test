<?php

namespace App\Domain\Records\Contracts;

use Illuminate\Support\Collection;

interface RecordsDatasetInterface
{
    /**
     * Return collection of DTO`s
     *
     * @return  Collection[App\Domain\Records\DTOs\RecordDTO]
     */
    public function get(): Collection;
}