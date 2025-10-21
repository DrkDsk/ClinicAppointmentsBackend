<?php

namespace App\Providers;

use App\Domain\Repositories\AppoinmentRepository;
use App\Domain\Repositories\DoctorRepository;
use App\Domain\Repositories\PatientRepository;
use App\Domain\Repositories\PersonRepository;
use App\Domain\Repositories\ReceptionistRepository;
use App\Domain\Repositories\UserRepository;
use App\Domain\Services\PatientServiceInterface;
use App\Domain\Services\PersonServiceInterface;
use App\Domain\Services\ReceptionistServiceInterface;
use App\Domain\Services\UserServiceInterface;
use App\Infrastructure\Persistence\EloquentAppointmentRepository;
use App\Infrastructure\Persistence\EloquentDoctorRepository;
use App\Infrastructure\Persistence\EloquentPatientRepository;
use App\Infrastructure\Persistence\EloquentPersonRepository;
use App\Infrastructure\Persistence\EloquentReceptionistRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\Infrastructure\Services\PatientService;
use App\Infrastructure\Services\PersonService;
use App\Infrastructure\Services\ReceptionistService;
use App\Infrastructure\Services\UserService;
use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //repositories
        $this->app->bind(DoctorRepository::class, EloquentDoctorRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(PersonRepository::class, EloquentPersonRepository::class);
        $this->app->bind(PatientRepository::class, EloquentPatientRepository::class);
        $this->app->bind(ReceptionistRepository::class, EloquentReceptionistRepository::class);
        $this->app->bind(AppoinmentRepository::class, EloquentAppointmentRepository::class);

        //services
        $this->app->bind(PatientServiceInterface::class, PatientService::class);
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ReceptionistServiceInterface::class, ReceptionistService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
