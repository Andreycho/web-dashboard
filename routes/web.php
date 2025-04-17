<?php

use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/configure/{id}', [DashboardController::class, 'configure']);
Route::post('/configure/{id}', [DashboardController::class, 'saveConfiguration']);

