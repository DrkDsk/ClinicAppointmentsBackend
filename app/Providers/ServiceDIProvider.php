<?php

namespace App\Providers;

use App\Infrastructure\Services\AppointmentService;
use App\Infrastructure\Services\DoctorService;
use App\Infrastructure\Services\PatientService;
use App\Infrastructure\Services\PersonService;
use App\Infrastructure\Services\ReceptionistService;
use App\Infrastructure\Services\UserService;
use App\Services\Contract\AppointmentServiceInterface;
use App\Services\Contract\DoctorServiceInterface;
use App\Services\Contract\PatientServiceInterface;
use App\Services\Contract\PersonServiceInterface;
use App\Services\Contract\ReceptionistServiceInterface;
use App\Services\Contract\UserServiceInterface;
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
