<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckModuleActive;
use App\Http\Controllers\API\ModuleController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/modules', ModuleController::class);
    Route::post('/modules/{id}/activate', [ModuleController::class, 'activate']);
    Route::post('/modules/{id}/desactivate', [ModuleController::class, 'desactivate']);
    Route::middleware('CheckModuleActive')->group(function () {
        Route::apiResource('/shorten', UrlShortenController::class);
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});