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
            "scheduled_at" => $this->schedule_at,
            "doctor" => new DoctorResource($this->doctor),
            "patient" => new PatientResource($this->patient),
            "typeAppointment" => new TypeAppointmentResource($this->typeAppointment)
        ];
    }
}
