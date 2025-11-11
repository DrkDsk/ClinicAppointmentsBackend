<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "scheduled_at" => $this->scheduled_at,
            "note" => $this->note,
            "doctor" => DoctorResource::make($this->whenLoaded('doctor')),
            "patient" => PatientResource::make($this->whenLoaded('patient')),
            "typeAppointment" => typeAppointmentResource::make($this->whenLoaded('typeAppointment')),
        ];
    }
}
