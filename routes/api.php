<?php

use App\Classes\Const\Role as RoleClass;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

$receptionistRole = RoleClass::RECEPTIONIST;
Route::prefix('users')
    ->middleware(['auth:sanctum', "role_or_admin:$receptionistRole"])->group(function () {

        Route::prefix('doctors')->group(function () {
            Route::post('create', [DoctorController::class, 'store']);
        });

        Route::prefix('patients')->group(function () {
            Route::get('get',[PatientController::class, 'get']);
            Route::post('create', [PatientController::class, 'store']);
        });

        Route::prefix('receptionists')->group(function () {
            Route::post('create', [ReceptionistController::class, 'store']);
        });

        Route::post('enroll/{person}', [UserController::class, 'enroll']);

        Route::prefix('roles')->group(function () {
            Route::post('set', [RoleController::class, 'set']);
            Route::post('only', [RoleController::class, 'only']);
        });

        Route::get('get', [UserController::class, 'get']);
    });

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});

Route::prefix('appointments')->middleware(['auth:sanctum', "role_or_admin:$receptionistRole"]) ->group(function () {
    Route::post('store', [AppointmentController::class, 'store']);
    Route::get('get', [AppointmentController::class, 'get']);
    Route::get('show/{appointment}', [AppointmentController::class, 'show']);
});
