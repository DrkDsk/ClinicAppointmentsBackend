<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\SpecialtyRepository;
use App\Http\Resources\SpecialtyResource;

class SpecialtyController extends Controller
{
    public function __construct(private readonly SpecialtyRepository $specialtyRepository)
    {
    }

    public function get() {
        $specialties = $this->specialtyRepository->getAll();

        return SpecialtyResource::collection($specialties);
    }
}
