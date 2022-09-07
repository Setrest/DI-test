<?php

namespace App\Http\Context\Records\Controllers;

use App\Domain\Records\Contracts\RecordsDatasetInterface;
use App\Domain\Records\Handlers\SaveRecordHandler;
use App\Domain\Records\Handlers\SaveToDatabaseRecordHandler;
use App\Domain\Records\Queries\GetDatabaseRecordsQuery;
use App\Domain\Records\Queries\GetRecordsQuery;
use App\Http\Context\Records\Requests\StoreRecordRequest;
use App\Http\Context\Records\Resources\RecordResource;
use App\Http\Controller;
use Illuminate\Support\Str;

class DatabaseRecordController extends Controller
{
    public function store(StoreRecordRequest $request, SaveToDatabaseRecordHandler $handler)
    {
        $payload = collect($request->validated())
            ->transformKeys(fn($key) => Str::camel($key));

        $handler->call(...$payload);

        return response()->json(['message' => 'Record created!'], 201);
    }

    public function index(GetDatabaseRecordsQuery $query)
    {
        return response()->json(RecordResource::collection($query->call()));
    }
}