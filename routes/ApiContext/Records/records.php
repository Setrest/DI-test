<?php

use App\Http\Context\Records\Controllers\DatabaseRecordController;
use App\Http\Context\Records\Controllers\RedisRecordController;
use Illuminate\Support\Facades\Route;

Route::post('records/db', [DatabaseRecordController::class, 'store'])->middleware('auth');
Route::get('records/db', [DatabaseRecordController::class, 'index']);

Route::get('records/redis', [RedisRecordController::class, 'index']);
Route::post('records/redis', [RedisRecordController::class, 'store'])->middleware('auth');
