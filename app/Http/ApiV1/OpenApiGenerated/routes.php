<?php

/**
 * NOTE: This file is auto generated by OpenAPI Generator.
 * Do NOT edit it manually. Run `php artisan openapi:generate-server`.
 */

use App\Http\ApiV1\Modules\APIRequests\Controllers\RecommendationsRequestController;
use Illuminate\Support\Facades\Route;

Route::post('rec', [RecommendationsRequestController::class, 'post']);