<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateDoctorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'was_created' => $this->resource->wasCreated,
            'person_was_created' => $this->resource->personResult->wasCreated,
            'doctor' => new DoctorResource($this->resource->model),
            'person' => new PersonResource($this->resource->personResult->model)
        ];
    }
}
