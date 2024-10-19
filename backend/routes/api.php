<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\MeetingController;


    // Public routes
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::put('/update/{id}', [AuthController::class, 'update']);
        Route::delete('/delete/{id}', [AuthController::class, 'delete']);

        // Meeting Room routes with 'api/rooms' prefix
        Route::prefix('rooms')->group(function () {
            Route::get('/', [MeetingRoomController::class, 'index']);
            Route::post('/', [MeetingRoomController::class, 'store'])->middleware('role:admin');
            Route::get('/{id}', [MeetingRoomController::class, 'show']);
            Route::put('/{id}', [MeetingRoomController::class, 'update'])->middleware('role:admin');
            Route::delete('/{id}', [MeetingRoomController::class, 'destroy'])->middleware('role:admin');
        });

        Route::prefix('meetings')->group(function () {
            Route::get('/', [MeetingController::class, 'index']);
            Route::post('/', [MeetingController::class, 'store']);
            Route::get('/{id}', [MeetingController::class, 'show']);
            Route::put('/{id}', [MeetingController::class, 'update']);
            Route::delete('/{id}', [MeetingController::class, 'destroy']);
        });
    });