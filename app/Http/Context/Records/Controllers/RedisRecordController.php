<?php

namespace App\Http\Context\Records\Controllers;

use App\Domain\Records\Handlers\SaveRecordHandler;
use App\Domain\Records\Handlers\SaveToRedisRecordHandler;
use App\Domain\Records\Queries\GetRecordsQuery;
use App\Domain\Records\Queries\GetRedisRecordsQuery;
use App\Http\Context\Records\Requests\StoreRecordRequest;
use App\Http\Context\Records\Resources\RecordResource;
use App\Http\Controller;
use Illuminate\Support\Str;

class RedisRecordController extends Controller
{
    public function store(StoreRecordRequest $request, SaveToRedisRecordHandler $handler)
    {
        $payload = collect($request->validated())
            ->transformKeys(fn($key) => Str::camel($key));

        $handler->call(...$payload);

        return response()->json(['message' => 'Record created!'], 201);
    }

    public function index(GetRedisRecordsQuery $query)
    {
        return response()->json(RecordResource::collection($query->call()));
    }
}