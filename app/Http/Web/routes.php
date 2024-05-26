<?php

use App\Http\Web\Controllers\HealthCheck;
use App\Http\Web\Controllers\OasController;
use App\Http\Web\Controllers\TestController;

use App\Http\ApiV1\Modules\APIRequests\Controllers\RecommendationsRequestController;
use Illuminate\Support\Facades\Route;

Route::get('health', HealthCheck::class);

Route::get('/', [OasController::class, 'list']);

Route::get('test', [TestController::class, 'get']);

Route::post('rec', [RecommendationsRequestController::class, 'get']);
