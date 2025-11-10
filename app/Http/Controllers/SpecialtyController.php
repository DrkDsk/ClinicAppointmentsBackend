<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpecialtyResource;
use App\Repositories\Contract\SpecialtyRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SpecialtyController extends Controller
{
    public function __construct(private readonly SpecialtyRepositoryInterface $specialtyRepository)
    {
    }

    public function get(): AnonymousResourceCollection
    {
        $specialties = $this->specialtyRepository->all();

        return SpecialtyResource::collection($specialties);
    }
}
