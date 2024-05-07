<?php

use App\Http\Web\Controllers\HealthCheck;
use App\Http\Web\Controllers\OasController;
use App\Http\Web\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('health', HealthCheck::class);

Route::get('/', [OasController::class, 'list']);

Route::get('test', [TestController::class, 'get']);
