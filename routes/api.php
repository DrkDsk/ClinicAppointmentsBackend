<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users/admin')
->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('get', [UserController::class, 'get']);
    Route::post('create', [UserController::class, 'create']);
});

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});

Route::prefix('users/roles')
->middleware('auth:sanctum')->group(function () {
    Route::post('set', [RoleController::class, 'set']);
});