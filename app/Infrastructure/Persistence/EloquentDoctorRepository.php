<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Repositories\DoctorRepository;
use App\Models\Doctor;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentDoctorRepository extends BaseRepository implements DoctorRepository
{
    public function __construct(Doctor $model)
    {
        parent::__construct($model);
    }
    /*public function create(string $personId, string $specialty): Doctor
    {
        return Doctor::create([
            'person_id' => $personId,
            'specialty' => $specialty
        ]);
    }

    public function getAllPaginate(int $perPage): LengthAwarePaginator
    {
        return Doctor::with(['person'])->paginate($perPage);
    }*/
}
