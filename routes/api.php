<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users/admin')
    ->middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::prefix('users')->group(function () {
            Route::post('create/{person}', [UserController::class, 'store']);
        });

        Route::prefix('doctors')->group(function () {
            Route::post('create', [DoctorController::class, 'store']);
        });

        Route::prefix('receptionists')->group(function () {
            Route::post('create/{person}', [ReceptionistController::class, 'store']);
        });

        Route::prefix('patients')->group(function () {
            Route::post('create/{user?}', [PatientController::class, 'store']);
        });
    });

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});

Route::prefix('users')
    ->middleware('auth:sanctum')->group(function () {
        Route::prefix('roles')->group(function () {
            Route::post('set', [RoleController::class, 'set']);
            Route::get('onlyAdmin', [RoleController::class, 'admins']);
        });

        Route::get('get', [UserController::class, 'get']);
    });