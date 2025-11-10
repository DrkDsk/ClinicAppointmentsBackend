<?php

namespace App\Providers;

use App\Domain\Repositories\AppointmentRepository;
use App\Domain\Repositories\DoctorRepositoryInterface;
use App\Domain\Repositories\PatientRepository;
use App\Domain\Repositories\PersonRepository;
use App\Domain\Repositories\ReceptionistRepository;
use App\Domain\Repositories\SpecialtyRepository;
use App\Domain\Repositories\UserRepository;
use App\Infrastructure\Persistence\EloquentAppointmentRepository;
use App\Infrastructure\Persistence\EloquentDoctorRepository;
use App\Infrastructure\Persistence\EloquentPatientRepository;
use App\Infrastructure\Persistence\EloquentPersonRepository;
use App\Infrastructure\Persistence\EloquentReceptionistRepository;
use App\Infrastructure\Persistence\EloquentSpecialtyRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryDIProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DoctorRepositoryInterface::class, EloquentDoctorRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(PersonRepository::class, EloquentPersonRepository::class);
        $this->app->bind(PatientRepository::class, EloquentPatientRepository::class);
        $this->app->bind(ReceptionistRepository::class, EloquentReceptionistRepository::class);
        $this->app->bind(AppointmentRepository::class, EloquentAppointmentRepository::class);
        $this->app->bind(SpecialtyRepository::class, EloquentSpecialtyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
