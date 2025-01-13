<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/{id}', [TodoController::class, 'detail']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/todos', [TodoController::class, 'store']);
    Route::patch('/todos/{id}', [TodoController::class, 'update']);
    Route::delete('/todos/{id}', [TodoController::class, 'delete']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

// 4|6EcSXiixEnOStBV0FqowLi9neJkMhNvRVEGU5wsV9fd1e5d2 => mobile
// "5|d5wAnUxXpFXBRUgQevpnu1puHZCDhQ0YXSIsncym6eb7020a" => web