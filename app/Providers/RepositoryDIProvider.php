<?php

namespace App\Providers;

use App\Repositories\Contract\AppointmentRepositoryInterface;
use App\Repositories\Contract\DoctorRepositoryInterface;
use App\Repositories\Contract\PatientRepositoryInterface;
use App\Repositories\Contract\PersonRepositoryInterface;
use App\Repositories\Contract\ReceptionistRepositoryInterface;
use App\Repositories\Contract\SpecialtyRepositoryInterface;
use App\Repositories\Contract\UserRepositoryInterface;
use App\Repositories\Eloquent\EloquentAppointmentRepository;
use App\Repositories\Eloquent\EloquentDoctorRepository;
use App\Repositories\Eloquent\EloquentPatientRepository;
use App\Repositories\Eloquent\EloquentPersonRepository;
use App\Repositories\Eloquent\EloquentReceptionistRepository;
use App\Repositories\Eloquent\EloquentSpecialtyRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryDIProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DoctorRepositoryInterface::class, EloquentDoctorRepository::class);
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(PersonRepositoryInterface::class, EloquentPersonRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, EloquentPatientRepository::class);
        $this->app->bind(ReceptionistRepositoryInterface::class, EloquentReceptionistRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, EloquentAppointmentRepository::class);
        $this->app->bind(SpecialtyRepositoryInterface::class, EloquentSpecialtyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
