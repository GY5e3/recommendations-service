<?php

use App\Http\Web\Controllers\HealthCheck;
use App\Http\Web\Controllers\OasController;

use App\Http\ApiV1\Modules\APIRequests\Controllers\RecommendationsRequestController;
use Illuminate\Support\Facades\Route;

Route::get('health', HealthCheck::class);

Route::get('/', [OasController::class, 'list']);

Route::post('rec', [RecommendationsRequestController::class, 'get']);
