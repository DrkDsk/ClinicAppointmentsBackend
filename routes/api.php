<?php

use App\Classes\Const\Role as RoleClass;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

$receptionistRole = RoleClass::RECEPTIONIST;
Route::middleware(['auth:sanctum', "role_or_admin:$receptionistRole"])->group(function () {

    Route::prefix('people')->group(function () {
        Route::get('get', [PeopleController::class, 'get']);
        Route::post('search', [PeopleController::class, 'search']);
    });

    Route::prefix('doctors')->group(function () {
        Route::post('create', [DoctorController::class, 'store']);
        Route::get('specialties', [SpecialtyController::class, 'get']);
    });

    Route::prefix('patients')->group(function () {
        Route::get('get',[PatientController::class, 'get']);
        Route::post('create', [PatientController::class, 'store']);
    });

    Route::prefix('receptionists')->group(function () {
        Route::post('create', [ReceptionistController::class, 'store']);
    });

    Route::prefix('roles')->group(function () {
        Route::post('set', [RoleController::class, 'set']);
        Route::post('only', [RoleController::class, 'only']);
    });

    Route::prefix('appointments')->group(function () {
        Route::post('store', [AppointmentController::class, 'store']);
        Route::get('get', [AppointmentController::class, 'get']);
        Route::get('show/{appointment}', [AppointmentController::class, 'show']);
    });
});

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::get('get', [UserController::class, 'get']);
    Route::post('enroll/{person}', [UserController::class, 'enroll']);
});
