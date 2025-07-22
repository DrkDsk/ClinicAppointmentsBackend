<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{

    private string $message = "";

    public function __construct($message = "Ha ocurrido un error")
    {
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            "message" => $this->message
        ];
    }
}
