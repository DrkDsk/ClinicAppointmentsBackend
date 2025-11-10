<?php
namespace App\Domain\Services;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Models\Doctor;
use Illuminate\Pagination\LengthAwarePaginator;

interface DoctorServiceInterface
{
    public function getAllPaginate(int $perPage): LengthAwarePaginator;
    public function create(CreateDoctorDTO $dto) : Doctor;
}
