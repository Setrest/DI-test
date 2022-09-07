<?php

use App\Http\Context\Authenticate\Controllers\AuthController;
use App\Infrastructure\Helpers\RouteHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/')->middleware('auth')->group(RouteHelper::routes('records'));
Route::post('auth', [AuthController::class, 'authByEmail']);