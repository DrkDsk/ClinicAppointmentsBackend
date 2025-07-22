<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{

    private string $message = "";
    private array $data = [];

    public function __construct($message = "Ha ocurrido un error", $data = [])
    {
        $this->message = $message;
        $this->data = $data;
    }

    public function toArray(Request $request): array
    {
        $response = [
            "message" => $this->message
        ];

        if (count($this->data)) {
           $response['data'] = $this->data;
        }

        return $response;
    }
}
