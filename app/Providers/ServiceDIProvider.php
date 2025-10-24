<?php

namespace App\Providers;

use App\Domain\Services\AppointmentServiceInterface;
use App\Domain\Services\DoctorServiceInterface;
use App\Domain\Services\PatientServiceInterface;
use App\Domain\Services\PersonServiceInterface;
use App\Domain\Services\ReceptionistServiceInterface;
use App\Domain\Services\UserServiceInterface;
use App\Infrastructure\Services\AppointmentService;
use App\Infrastructure\Services\DoctorService;
use App\Infrastructure\Services\PatientService;
use App\Infrastructure\Services\PersonService;
use App\Infrastructure\Services\ReceptionistService;
use App\Infrastructure\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceDIProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PatientServiceInterface::class, PatientService::class);
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ReceptionistServiceInterface::class, ReceptionistService::class);
        $this->app->bind(AppointmentServiceInterface::class, AppointmentService::class);
        $this->app->bind(DoctorServiceInterface::class, DoctorService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
