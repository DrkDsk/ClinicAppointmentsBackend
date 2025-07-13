<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'get'])->middleware('auth:sanctum');

Route::prefix('user/admin')
->name('user.admin')
->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('get', function () {
        return "only admins";
    });
});

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});
