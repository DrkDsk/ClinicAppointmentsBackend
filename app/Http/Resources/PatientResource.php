<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "weight" => $this->weight,
            "height" => $this->height,
            "weight_measure_type" => $this->weight_measure_type,
            "height_measure_type" => $this->height_measure_type,
            'profile' => ProfileResource::make($this->whenLoaded('person')),
        ];
    }
}
